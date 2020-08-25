<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $table = 'penilaians';
    protected $fillable = ['periode_id','tahun_ajaran_id','siswa_id','kriteria_id','subkriteria_id','nilai_sub','nilai_normalisasi','bobot_normalisasi'];

    public function periode()
    {
    	return $this->hasOne(Periode::class);
    }

    public function tahun_ajaran()
    {
    	return $this->hasOne(TahunAjaran::class);
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function siswaPenilaian()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function kriteria()
    {
    	return $this->belongsTo(Kriteria::class);
    }

    public function Subkriteria()
    {
    	return $this->belongsTo(Subkriteria::class);
    }


}
