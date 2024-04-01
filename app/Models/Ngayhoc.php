<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ngayhoc
 * 
 * @property int $id
 * @property int $MonHoc
 * @property Carbon $Start
 * @property Carbon $End
 * 
 * @property Monhoc $monhoc
 *
 * @package App\Models
 */
class Ngayhoc extends Model
{
	protected $table = 'ngayhocs';
	public $timestamps = false;

	protected $casts = [
		'MonHoc' => 'int',
		'Start' => 'datetime',
		'End' => 'datetime'
	];

	protected $fillable = [
		'MonHoc',
		'Start',
		'End'
	];

	public function monhoc()
	{
		return $this->belongsTo(Monhoc::class, 'MonHoc');
	}
}
