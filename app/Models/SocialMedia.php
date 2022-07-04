<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SocialMedia
 * 
 * @property int $id
 * @property int|null $user_id
 * @property string|null $name
 * @property string|null $url
 * @property int|null $show_social_media
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User|null $user
 *
 * @package App\Models
 */
class SocialMedia extends Model
{
	protected $table = 'social_medias';

	protected $casts = [
		'user_id' => 'int',
		'show_social_media' => 'int'
	];

	protected $fillable = [
		'user_id',
		'name',
		'url',
		'show_social_media'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
