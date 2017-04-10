<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\JurusanModel;

/**
* Siswa Model
*/
class SiswaModel extends Model
{
	protected $table = 'siswa';
	protected $primaryKey = 'id';
	protected $fillable = ['name', 'prodi_id'];
	public $timestamps	= false;
	// public $updated_at      = false;
    // public $created_at      = false;

	public function jurusan()
	{
		return $this->belongsTo(JurusanModel::class);
	}
}
