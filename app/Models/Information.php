<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Information
 * 
 * @property int $id
 * @property int|null $user_id
 * @property string|null $title
 * @property string|null $slug
 * @property string|null $content
 * @property int|null $show_information
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User|null $user
 *
 * @package App\Models
 */
class Information extends Model
{
	protected $table = 'informations';

	protected $casts = [
		'user_id' => 'int',
		'show_information' => 'int'
	];

	protected $fillable = [
		'user_id',
		'title',
		'slug',
		'content',
		'show_information'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
