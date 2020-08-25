<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasilPenilaian extends Model
{
    protected $table = 'hasil_penilaians';
    protected $fillable = ['periode_id','tahun_ajaran_id','siswa_id','hasil_penilaians'];

    public function periode()
    {
    	return $this->belongsTo(Periode::class, 'periode_id');
    }

    public function tahun_ajaran()
    {
    	return $this->belongsTo(TahunAjaran::class);
    }

    public function siswa()
    {
    	return $this->belongsTo(Siswa::class);
    }
}
