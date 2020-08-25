<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenilaiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaians', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tahun_ajaran_id')->unsigned();
            $table->integer('siswa_id')->unsigned();
            $table->integer('kriteria_id')->unsigned();
            $table->integer('subkriteria_id')->unsigned();
            $table->double('nilai_sub');
            $table->double('nilai_normalisasi');
            $table->double('bobot_normalisasi');
            $table->timestamps();

            $table->foreign('tahun_ajaran_id')->references('id')->on('tahun_ajarans')->onDelete('cascade');
            $table->foreign('siswa_id')->references('id')->on('siswas')->onDelete('cascade');
            $table->foreign('kriteria_id')->references('id')->on('kriterias')->onDelete('cascade');
            $table->foreign('subkriteria_id')->references('id')->on('subkriterias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penilaians');
    }
}
