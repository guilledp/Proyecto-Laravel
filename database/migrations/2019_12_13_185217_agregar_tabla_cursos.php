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
        $table->integer('empresa_id')->unsigned();
        $table->uuid('uuid')->unique();
        $table->string('nombre',200)->nullable()->default(null);
        $table->text('linkVideo')->nullable()->default(null);
        $table->text('linkPDF')->nullable()->default(null);
        $table->text('linkPPT')->nullable()->default(null);
        $table->text('linkExamen')->nullable()->default(null);
        $table->boolean('activo')->default(true);

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
      Schema::dropIfExists('cursos');
    }
}
