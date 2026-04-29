<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use App\Models\Tenant;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;

class BookingController extends Controller
{
    public function __construct()
{
    \Midtrans\Config::$serverKey    = env('MIDTRANS_SERVER_KEY');
    \Midtrans\Config::$clientKey    = env('MIDTRANS_CLIENT_KEY');
    \Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
    \Midtrans\Config::$isSanitized  = env('MIDTRANS_IS_SANITIZED', true);
    \Midtrans\Config::$is3ds        = env('MIDTRANS_IS_3DS', true);
}

    // CREATE - tampilkan form booking
    public function create(Request $request)
    {
        $room = Room::findOrFail($request->room_id);
        return view('booking.create', compact('room'));
    }

    // STORE - simpan booking & generate snap token DP
    public function store(Request $request)
    {
        $request->validate([
            'room_id'    => 'required|exists:rooms,id',
            'duration'   => 'required|in:1,3,6,12',
            'start_date' => 'required|date|after_or_equal:today',
        ]);

        $room      = Room::findOrFail($request->room_id);
        $dpAmount  = $room->price * 0.5; // DP 50%
        $orderId   = 'DP-' . time() . '-' . Auth::id();

        // Buat booking
        $booking = Booking::create([
            'user_id'           => Auth::id(),
            'room_id'           => $room->id,
            'booking_code'      => Booking::generateBookingCode(),
            'duration'          => $request->duration,
            'start_date'        => $request->start_date,
            'dp_amount'         => $dpAmount,
            'midtrans_order_id' => $orderId,
            'status'            => 'pending',
            'dp_status'         => 'pending',
        ]);

        // Generate Snap Token Midtrans
        $params = [
            'transaction_details' => [
                'order_id'     => $orderId,
                'gross_amount' => (int) $dpAmount,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email'      => Auth::user()->email,
            ],
            'item_details' => [
                [
                    'id'       => 'DP-ROOM-' . $room->id,
                    'price'    => (int) $dpAmount,
                    'quantity' => 1,
                    'name'     => 'DP Sewa Kamar ' . $room->room_number . ' (' . $request->duration . ' bulan)',
                ]
            ],
        ];

        $snapToken = Snap::getSnapToken($params);
        $booking->update(['snap_token' => $snapToken]);

        return redirect()->route('booking.upload-dp', ['booking' => $booking->id]);
    }

    // UPLOAD DP - tampilkan halaman bayar DP
    public function uploadDp($bookingId)
    {
        $booking = Booking::with('room')->findOrFail($bookingId);
        return view('booking.upload-dp', compact('booking'));
    }

    // CONFIRMATION - halaman sukses
    public function confirmation($bookingId)
    {
        $booking = Booking::with('room')->findOrFail($bookingId);
        return view('booking.confirmation', compact('booking'));
    }

    // STATUS - tracking status booking
    public function status()
    {
        $booking = Booking::with('room')
            ->where('user_id', Auth::id())
            ->latest()
            ->firstOrFail();
        return view('booking.status', compact('booking'));
    }

    // WEBHOOK - terima notifikasi DP dari Midtrans
    public function webhook(Request $request)
    {
        $notification = new Notification();

        $orderId           = $notification->order_id;
        $transactionStatus = $notification->transaction_status;
        $fraudStatus       = $notification->fraud_status;
        $paymentType       = $notification->payment_type;

        $booking = Booking::where('midtrans_order_id', $orderId)->firstOrFail();

        if ($transactionStatus == 'capture' && $fraudStatus == 'accept') {
            $booking->update([
                'dp_status'      => 'paid',
                'status'         => 'dp_paid',
                'payment_method' => $paymentType,
            ]);
        } elseif ($transactionStatus == 'settlement') {
            $booking->update([
                'dp_status'      => 'paid',
                'status'         => 'dp_paid',
                'payment_method' => $paymentType,
            ]);
        } elseif (in_array($transactionStatus, ['cancel', 'deny', 'expire'])) {
            $booking->update(['status' => 'pending', 'dp_status' => 'pending']);
        }

        return response()->json(['status' => 'ok']);
    }
}