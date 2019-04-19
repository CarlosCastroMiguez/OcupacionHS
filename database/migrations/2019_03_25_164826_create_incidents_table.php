<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidents', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('title');
            $table->string('description');
            $table->string('severity', 1);   
            
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');   
            
            $table->unsignedInteger('level_id');
            $table->foreign('level_id')->references('id')->on('levels');
            
            $table->unsignedInteger('client_id');
            $table->foreign('client_id')->references('id')->on('users');
            
            $table->unsignedInteger('support_id');
            $table->foreign('support_id')->references('id')->on('users');
            
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
        Schema::dropIfExists('incidents');
    }
}
