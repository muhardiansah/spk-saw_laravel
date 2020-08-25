<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
	protected $table = 'periodes';
	protected $fillable = ['nama_periode'];

	public function tahun_ajaran()
	{
		return $this->hasMany(TahunAjaran::class);
	}

	public function penilaian()
	{
		return $this->belongsTo(Penilaian::class);
	}

	public function hasil_penilaian()
	{
		return $this->hasMany(HasilPenilaian::class);
	}
}
