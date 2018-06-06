<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table='gurus';
    protected $fillable=['nama_guru','nip','jabatan'];
    public $timestamps=true;

    public function Ekskul()
	{
		return $this->hasMany('App\Ekskul','guru_id');
	}

}
