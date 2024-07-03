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
            $table->string('number');
            $table->date('echeance');
            $table->string('client_name');
            $table->string('client_quartier');
            $table->string('client_city');
            $table->string('client_country');
            $table->string('client_phone');
            $table->string('client_mail');
            $table->string('designation_title');
            $table->string('designation_detail');
            $table->integer('quantity');
            $table->integer('unit_price');
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
