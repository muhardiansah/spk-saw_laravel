<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHasilPenilaiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_penilaians', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tahun_ajaran_id')->unsigned();
            $table->integer('siswa_id')->unsigned();
            $table->double('hasil_penilaians');
            $table->timestamps();

            $table->foreign('tahun_ajaran_id')->references('id')->on('tahun_ajarans')->onDelete('cascade');;
            $table->foreign('siswa_id')->references('id')->on('siswas')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hasil_penilaians');
    }
}
