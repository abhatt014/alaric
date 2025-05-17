<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('asset_return_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asset_assignment_id')->constrained('asset_assignments'); // Foreign key to asset_assignments table
            //$table->foreignId('asset_id')->constrained('assets'); // Foreign key to assets table
            $table->foreignId('user_id')->constrained('users'); // Foreign key to users table
            $table->foreignId('asset_id')->constrained('assets'); // Foreign key to users table
            $table->text('condition')->nullable(); // asset condition
            $table->enum('status', ['admin-pending','hr-pending', 'approved', 'rejected','user-cancelled'])->default('admin-pending'); // Status of the return request
            $table->text('notes')->nullable(); // Additional notes for the return request (optional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_return_requests');
    }
};
