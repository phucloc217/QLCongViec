<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tintuc
 * 
 * @property int $id
 * @property string $tieude
 * @property string $tomtat
 * @property string $noidung
 * @property string|null $slug
 * @property string|null $anh
 * @property int|null $danhmuc
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 *
 * @package App\Models
 */
class Tintuc extends Model
{
	protected $table = 'tintucs';

	protected $casts = [
		'danhmuc' => 'int'
	];

	protected $fillable = [
		'tieude',
		'tomtat',
		'noidung',
		'slug',
		'anh',
		'danhmuc'
	];

	public function danhmuc()
	{
		return $this->belongsTo(Danhmuc::class, 'danhmuc');
	}
}
