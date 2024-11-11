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
        Schema::create('wallet_transactions', function (Blueprint $table) {
            $table->id();

            $table->string('user');
            $table->string('email')->nullable();
            $table->double('value');            
            $table->double('fee');
            $table->string('type');
            $table->string('hash');
            $table->char('currency')->nullable();
            $table->char('approvedBy');
            $table->char('wallet')->nullable();
            $table->boolean('inOut');
            $table->string('status');
            $table->string('detail');

            $table->timestamps();

            // Agrega la llave foránea aquí
            $table->foreign("user")->references("id")->on("users");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wallet_transactions');
    }
};
