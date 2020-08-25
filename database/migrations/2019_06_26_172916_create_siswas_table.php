<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_siswa');
            $table->string('jk');
            $table->integer('kelas_id')->unsigned();
            $table->string('alamat');
            $table->char('peringkat_kls', 3);
            $table->integer('jml_tanggungan');
            $table->string('status_anak');
            $table->integer('penghasilan_ortu');
            $table->timestamps();

            $table->foreign('kelas_id')->references('id')->on('kelas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswas');
    }
}
