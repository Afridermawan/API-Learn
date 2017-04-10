<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SiswaModel;

/**
* Jurusan Model
*/
class JurusanModel extends Model
{
	protected $table = 'jurusan';
	protected $primaryKey = 'id';
	protected $fillable = ['prodi'];

	public function siswa()
	{
		return $this->hasMany(SiswaModel::class);
	}
}
