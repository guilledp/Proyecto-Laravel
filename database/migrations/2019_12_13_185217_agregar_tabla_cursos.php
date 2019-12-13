<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarTablaCursos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('cursos', function (Blueprint $table) {
      // Campos especificos
        $table->bigIncrements('id');
        $table->string('nombre',200)->nullable();
        $table->text('linkVideo')->nullable();
        $table->text('linkPDF')->nullable();
        $table->text('linkPPT')->nullable();
        $table->text('linkExamen')->nullable();
        $table->integer('empresa_ID');
        $table->timestamps();
      // Campos especificos
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('cursos');
    }
}
