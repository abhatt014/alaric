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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asset_type')->constrained('asset_types');
            $table->string('asset_brand');
            $table->string('asset_model');
            $table->string('asset_name');
            $table->string('asset_ipaddress')->nullable();
            $table->string('asset_serial');
            $table->string('asset_ram')->nullable();
            $table->string('asset_ssd')->nullable();
            $table->string('asset_hdd')->nullable();
            $table->string('asset_mac')->nullable();
            $table->string('asset_processor')->nullable();
            $table->string('asset_resolution')->nullable();
            $table->enum('asset_status', ['unassigned', 'assigned', 'faulty', 'disposed', 'sold'])->default('unassigned');
            $table->date('purchase_date')->nullable();
            $table->decimal('purchase_cost', 10, 2)->nullable();
            $table->text('notes')->nullable();
            $table->enum('is_consumable', ['yes', 'no'])->default('no');
            $table->text('image_path')->nullable();
            $table->text('invoice')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
