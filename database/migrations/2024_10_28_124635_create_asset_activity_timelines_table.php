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
        Schema::create('asset_activity_timelines', function (Blueprint $table) {
            
        $table->id();
        $table->foreignId('asset_id')->constrained('assets');
        $table->foreignId('user_id')->constrained('users');
        $table->enum('action', ['created','modified','assigned','return-admin-approved','returned','unassigned', 'faulty', 'disposed', 'sold']);
        $table->text('notes')->nullable();
        $table->string('images')->nullable();
        $table->timestamp('action_date')->useCurrent();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_activity_timelines');
    }
};
