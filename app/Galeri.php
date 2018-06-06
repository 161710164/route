<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table='galeris';
    protected $fillable=['judul', 'fasilitas_id'];
    public $timestamps=true;

        public function Fasilitas()
	{
		return $this->belongsto('App\Fasilitas','fasilitas_id');
	}
}
