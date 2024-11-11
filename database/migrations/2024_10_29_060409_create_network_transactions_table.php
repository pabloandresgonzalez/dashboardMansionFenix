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
        Schema::create('network_transactions', function (Blueprint $table) {
            $table->id();

            $table->char('user', 36); // Definir el campo user como CHAR(36)
            $table->double('value');
            $table->double('fee');
            $table->string('type');
            $table->unsignedBigInteger('userMembership'); // Define userMembership como bigint(20) UNSIGNED
            $table->string('status');
            $table->char('currency', 36)->nullable(); // Define el campo currency después de status
            $table->string('detail');
            
            $table->timestamps();

            // Definir la clave foránea para user referenciando a la tabla users
            $table->foreign('user')->references('id')->on('users')->onDelete('cascade');

            // Definir la clave foránea para userMembership referenciando a la tabla user_memberships
            $table->foreign('userMembership')->references('id')->on('user_memberships')->onDelete('cascade');

            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('network_transactions');
    }
};
