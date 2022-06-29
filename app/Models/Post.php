<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 * 
 * @property int $id
 * @property int|null $user_id
 * @property string|null $title
 * @property string|null $slug
 * @property string|null $content
 * @property string|null $type
 * @property int|null $show_post
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User|null $user
 *
 * @package App\Models
 */
class Post extends Model
{
	protected $table = 'posts';

	protected $casts = [
		'user_id' => 'int',
		'show_post' => 'int'
	];

	protected $fillable = [
		'user_id',
		'title',
		'slug',
		'content',
		'type',
		'show_post'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
