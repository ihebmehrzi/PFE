<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarAgenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_agencies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('v_matricule');
            $table->float('kilometrage');
            $table->string('couleur');
            $table->float('prix');
            $table->string('photo');
            $table->string('disponibilite');
            $table->text('description');


            $table->integer('marque_id')->unsigned()->nullable();


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
        Schema::dropIfExists('car_agencies');
    }
}
