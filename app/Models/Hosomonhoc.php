<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Hosomonhoc
 * 
 * @property int $id
 * @property int $MonHoc
 * @property int $LoaiGiayTo
 * @property bool $TrangThai
 * 
 * @property Monhoc $monhoc
 * @property Hoso $hoso
 *
 * @package App\Models
 */
class Hosomonhoc extends Model
{
	protected $table = 'hosomonhocs';
	public $timestamps = false;

	protected $casts = [
		'MonHoc' => 'int',
		'LoaiGiayTo' => 'int',
		'TrangThai' => 'bool'
	];

	protected $fillable = [
		'MonHoc',
		'LoaiGiayTo',
		'TrangThai'
	];

	public function monhoc()
	{
		return $this->belongsTo(Monhoc::class, 'MonHoc');
	}

	public function hoso()
	{
		return $this->belongsTo(Hoso::class, 'LoaiGiayTo');
	}
}
