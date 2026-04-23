<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Tenant;
use App\Models\Payment;
use Carbon\Carbon;

class GenerateMonthlyInvoices extends Command
{
    protected $signature   = 'invoices:generate';
    protected $description = 'Generate monthly invoices for all active tenants';

    public function handle()
    {
        $tenants = Tenant::where('status', 'active')->with('room')->get();
        $count   = 0;

        foreach ($tenants as $tenant) {
            // Cek apakah sudah ada invoice bulan ini
            $exists = Payment::where('tenant_id', $tenant->id)
                ->whereMonth('due_date', now()->month)
                ->whereYear('due_date', now()->year)
                ->exists();

            if (!$exists) {
                Payment::create([
                    'tenant_id'      => $tenant->id,
                    'invoice_number' => Payment::generateInvoiceNumber(),
                    'amount'         => $tenant->room->price,
                    'due_date'       => Carbon::parse($tenant->start_date)->setMonth(now()->month)->setYear(now()->year),
                    'status'         => 'pending',
                ]);
                $count++;
            }
        }

        $this->info("Generated {$count} invoices.");
    }
}