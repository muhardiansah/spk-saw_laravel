<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subkriteria extends Model
{
    protected $table = 'subkriterias';
    protected $fillable = ['kriteria_id', 'nama_subkriteria','min','max','nilai'];
    protected $guarded = [];

    public function kriteria()
    {
    	return $this->belongsTo(Kriteria::class);
    }

    public function penilaian()
	{
		return $this->belongsTo(Penilaian::class);
	}
}
