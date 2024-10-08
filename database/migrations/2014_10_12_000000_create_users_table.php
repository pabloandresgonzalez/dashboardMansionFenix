<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->uuid('id')->primary(); // Define el campo 'id' como UUID y clave primaria
            $table->string('name');
            $table->string('lastname');
            $table->string('typeDoc');
            $table->string('numberDoc')->unique();
            $table->string('role'); // 'admin', 'user'
            $table->string('phone');
            $table->string('cellphone');
            $table->string('country');
            $table->string('level');
            $table->string('photo')->nullable();
            $table->string('photoDoc')->nullable();
            $table->string('isActive');
            $table->uuid('ownerId');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->rememberToken();
            $table->timestamps();
            /*
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->bigInteger('phone')->nullable();
            $table->string('location')->nullable();
            $table->string('about_me')->nullable();
            $table->rememberToken();
            $table->timestamps();
            */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
