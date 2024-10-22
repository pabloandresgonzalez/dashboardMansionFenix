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
        Schema::create('user_memberships', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_membresia');
            $table->unsignedBigInteger('membresiaPadre')->nullable();
            $table->string('membership');
            $table->string('user_email')->nullable();
            $table->string('user'); 
            $table->string('user_name')->nullable();           
            $table->string('hashUSDT')->unique();
            $table->string('hashBTC')->unique()->nullable();         
            $table->string('detail');
            $table->string('status');
            $table->string('image')->nullable();
            $table->date('closedAt')->nullable();
            $table->timestamp('activedAt')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_memberships');
    }
};
