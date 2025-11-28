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
        Schema::create('verifications', function (Blueprint $table) {
            Schema::create('verifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lost_item_id')->constrained('lost_items');
            $table->foreignId('owner_id')->constrained('users');
            $table->foreignId('finder_id')->constrained('users');
            $table->text('kriteria_pemilik')->nullable();
            $table->enum('hasil', ['pending','cocok','tidak'])->default('pending');
            $table->timestamps();
        });

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verifications');
    }
};
