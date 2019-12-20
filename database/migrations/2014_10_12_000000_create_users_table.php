<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->uuid('uuid')->unique();
            $table->string('name', 100);
            $table->string('lastname', 100);
            $table->string('codigo_empresa')->nullable()->default(null);
            $table->string('email',100)->unique();
            $table->timestamp('email_verified_at')->nullable()->default(null);
            $table->string('password');
                
                $table->boolean('es_empresa')->default(false);
                $table->string('empresa', 100)->nullable()->default(null);
                $table->string('cuit', 11)->nullable()->default(null);
            // Campos especificos
            $table->string('avatar',100)->default('default.png');
            $table->string('logo',100)->default('logo-default.png');
            // Campos especificos
            $table->rememberToken();
            $table->timestamps();
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
