<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('room_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('nik', 16)->unique();
            $table->string('ktp_photo')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->integer('duration'); // dalam bulan: 1, 3, 6, 12
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['active', 'pending', 'past'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};