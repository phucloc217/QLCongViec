<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Hoso
 * 
 * @property int $id
 * @property int $LoaiGiayTo
 * 
 * @property Collection|Monhoc[] $monhocs
 *
 * @package App\Models
 */
class Hoso extends Model
{
	protected $table = 'hoso';
	public $timestamps = false;

	protected $casts = [
		'LoaiGiayTo' => 'int'
	];

	protected $fillable = [
		'LoaiGiayTo'
	];

	public function monhocs()
	{
		return $this->belongsToMany(Monhoc::class, 'hosomonhocs', 'LoaiGiayTo', 'MonHoc')
					->withPivot('id', 'TrangThai');
	}
}
