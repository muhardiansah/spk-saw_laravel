<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubkriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subkriterias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kriteria_id')->unsigned();
            $table->string('nama_subkriteria');
            $table->double('nilai');
            $table->timestamps();

            $table->foreign('kriteria_id')->references('id')->on('kriterias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subkriterias');
    }
}
