<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswas';
    protected $fillable = ['nama_siswa','jk','kelas_id','alamat','peringkat_kls','jml_tanggungan','status_anak','penghasilan_ortu'];

    public function kelas()
    {
    	return $this->belongsTo(Kelas::class);
    }

    public function penilaian()
	{
		return $this->hasMany(Penilaian::class);
	}

    public function hasil_penilaian()
    {
        return $this->hasMany(HasilPenilaian::class);
    }
}
