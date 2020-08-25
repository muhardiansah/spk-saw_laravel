<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    protected $table = 'tahun_ajarans';
    protected $fillable = ['keterangan','tgl_start','tgl_end','periode_id'];
    protected $guarded = [];

    public function penilaian()
	{
		return $this->belongsTo(Penilaian::class);
	}

	public function hasil_penilaian()
	{
		return $this->hasMany(HasilPenilaian::class);
	}

	public function periode()
	{
		return $this->belongsTo(Periode::class, 'periode_id');
	}
}
