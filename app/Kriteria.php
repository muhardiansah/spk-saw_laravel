<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $table = 'kriterias';
    protected $fillable = ['nama_kriteria', 'tipe_kriteria','bobot'];
    protected $guarded = [];

    public function subkriteria()
    {
    	return $this->hasMany(Subkriteria::class);
    }

    public function penilaian()
	{
		return $this->belongsTo(Penilaian::class);
	}
}
