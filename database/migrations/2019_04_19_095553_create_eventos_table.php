<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nombre');
            $table->TinyInteger('numAlumnos');
            //$table->Date('date');
            $table->datetime('start_date');
            $table->datetime('end_date');
            
            $table->unsignedInteger('id_asignatura');
            $table->foreign('id_asignatura')->references('id')->on('asignaturas');

            $table->unsignedInteger('id_profesor');
            $table->foreign('id_profesor')->references('id')->on('profesors');
            
            $table->unsignedInteger('id_sala');
            $table->foreign('id_sala')->references('id')->on('salas');
            
            $table->unsignedInteger('id_simulador')->nullable();
            $table->foreign('id_simulador')->references('id')->on('simuladors');
            
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
        Schema::dropIfExists('eventos');
    }
}
