<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ekskul extends Model
{
    protected $table='ekskuls';
    protected $fillable=['nama_ekskul','guru_id','fasilitas_id', 'jadwal'];
    public $timestamps=true;

        public function Guru()
	{
		return $this->belongsto('App\Guru','guru_id');
	}
	public function Fasilitas()
	{
		return $this->belongsto('App\Fasilitas','fasilitas_id');
	}
}
