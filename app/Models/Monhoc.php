<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Monhoc
 * 
 * @property int $id
 * @property string $TenMH
 * @property string $Lop
 * @property int $LT
 * @property int $TH
 * @property Carbon|null $NgayThi
 * @property Carbon|null $NgayThanhToan
 * 
 * @property Collection|Hoso[] $hosos
 * @property Collection|Ngayhoc[] $ngayhocs
 *
 * @package App\Models
 */
class Monhoc extends Model
{
	protected $table = 'monhocs';
	public $timestamps = false;

	protected $casts = [
		'LT' => 'int',
		'TH' => 'int',
		'NgayThi' => 'datetime',
		'NgayThanhToan' => 'datetime'
	];

	protected $fillable = [
		'TenMH',
		'Lop',
		'LT',
		'TH',
		'NgayThi',
		'NgayThanhToan'
	];

	public function hosos()
	{
		return $this->belongsToMany(Hoso::class, 'hosomonhocs', 'MonHoc', 'LoaiGiayTo')
					->withPivot('id', 'TrangThai');
	}

	public function ngayhocs()
	{
		return $this->hasMany(Ngayhoc::class, 'MonHoc');
	}
}
