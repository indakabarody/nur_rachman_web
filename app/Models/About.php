<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class About
 * 
 * @property int $id
 * @property int|null $user_id
 * @property string|null $title
 * @property string|null $slug
 * @property string|null $content
 * @property int|null $show_about
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User|null $user
 *
 * @package App\Models
 */
class About extends Model
{
	protected $table = 'abouts';

	protected $casts = [
		'user_id' => 'int',
		'show_about' => 'int'
	];

	protected $fillable = [
		'user_id',
		'title',
		'slug',
		'content',
		'show_about'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
