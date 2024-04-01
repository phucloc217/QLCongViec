<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Danhmuc
 * 
 * @property int $id
 * @property string|null $tendm
 * @property Carbon|null $updated_at
 * @property Carbon|null $created_at
 * 
 * @property Collection|Tintuc[] $tintucs
 *
 * @package App\Models
 */
class Danhmuc extends Model
{
	protected $table = 'danhmuc';

	protected $fillable = [
		'tendm'
	];

	public function tintucs()
	{
		return $this->hasMany(Tintuc::class, 'danhmuc');
	}
}
