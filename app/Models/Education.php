<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Education
 * 
 * @property int $id
 * @property int|null $user_id
 * @property string|null $title
 * @property string|null $slug
 * @property string|null $content
 * @property int|null $show_education
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User|null $user
 *
 * @package App\Models
 */
class Education extends Model
{
	protected $table = 'educations';

	protected $casts = [
		'user_id' => 'int',
		'show_education' => 'int'
	];

	protected $fillable = [
		'user_id',
		'title',
		'slug',
		'content',
		'show_education'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
