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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('number')->nullable();
            $table->date('echeance');
            $table->string('client_name')->nullable();
            $table->string('client_quartier')->nullable();
            $table->string('client_city')->nullable();
            $table->string('client_country')->nullable();
            $table->string('client_phone')->nullable();
            $table->string('client_mail')->nullable();
            $table->decimal('montant_avanc', 10, 2)->nullable();
            $table->string('mode_paiment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
