<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    // INDEX - list semua room
    public function index(Request $request)
    {
        $query = Room::with('activeTenant');

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $rooms = $query->latest()->get();

        return view('dashboard.rooms', compact('rooms'));
    }

    // CREATE - tampilkan form tambah room
    public function create()
    {
        return view('dashboard.room-form');
    }

    // STORE - simpan room baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_number' => 'required|string|unique:rooms,room_number',
            'type'        => 'required|in:Regular,VIP,Suite',
            'price'       => 'required|numeric|min:0',
            'status'      => 'required|in:available,occupied,maintenance',
            'description' => 'nullable|string',
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'facilities'  => 'nullable|array',
        ]);

        // Upload foto
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('rooms', 'public');
        }

        // Simpan facilities sebagai JSON
        $validated['facilities'] = $request->input('facilities', []);

        Room::create($validated);

        return redirect()->route('dashboard.rooms')
            ->with('success', 'Room berhasil ditambahkan!');
    }

    // EDIT - tampilkan form edit
    public function edit($id)
    {
        $room = Room::findOrFail($id);
        return view('dashboard.room-form', compact('room'));
    }

    // UPDATE - simpan perubahan room
    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);

        $validated = $request->validate([
            'room_number' => 'required|string|unique:rooms,room_number,' . $room->id,
            'type'        => 'required|in:Regular,VIP,Suite',
            'price'       => 'required|numeric|min:0',
            'status'      => 'required|in:available,occupied,maintenance',
            'description' => 'nullable|string',
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'facilities'  => 'nullable|array',
        ]);

        // Upload foto baru jika ada
        if ($request->hasFile('photo')) {
            if ($room->photo) {
                Storage::disk('public')->delete($room->photo);
            }
            $validated['photo'] = $request->file('photo')->store('rooms', 'public');
        }

        $validated['facilities'] = $request->input('facilities', []);

        $room->update($validated);

        return redirect()->route('dashboard.rooms')
            ->with('success', 'Room berhasil diperbarui!');
    }

    // DESTROY - hapus room
    public function destroy($id)
    {
        $room = Room::findOrFail($id);

        // Cek apakah room masih ada tenant aktif
        if ($room->activeTenant) {
            return redirect()->route('dashboard.rooms')
                ->with('error', 'Room tidak bisa dihapus karena masih ada tenant aktif!');
        }

        // Hapus foto
        if ($room->photo) {
            Storage::disk('public')->delete($room->photo);
        }

        $room->delete();

        return redirect()->route('dashboard.rooms')
            ->with('success', 'Room berhasil dihapus!');
    }
}