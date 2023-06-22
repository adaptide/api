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
        Schema::create('client_invites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')
                ->constrained()
                ->restrictOnDelete();
            $table->foreignId('invited_client_id')
                ->constrained('clients')
                ->restrictOnDelete();
            $table->boolean('ordered')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_invites');
    }
};