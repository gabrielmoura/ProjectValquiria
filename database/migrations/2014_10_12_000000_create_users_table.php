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
            $table->id();
            $table->string('name')->comment('Apelido');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('adm')->comment('IsAdmin?')->nullable();
            $table->string('avatar')->nullable();
            $table->string('doc')->nullable(); //Seguindo Marco Civil; Dado Criptografado
            $table->rememberToken();
            $table->timestamps();
            $table->boolean('password_temporary')->comment('Senha Temporária')->nullable();
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
