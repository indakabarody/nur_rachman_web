<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Setting
 * 
 * @property int $id
 * @property string|null $website_title
 * @property string|null $logo
 * @property string|null $hero_image
 * @property string|null $hero_text
 * @property string|null $accent_color
 * @property string|null $copyright_text
 * @property string|null $address
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $smtp_host
 * @property string|null $smtp_port
 * @property string|null $smtp_secure
 * @property string|null $smtp_username
 * @property string|null $smtp_password
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Setting extends Model
{
	protected $table = 'settings';

	protected $hidden = [
		'smtp_password'
	];

	protected $fillable = [
		'website_title',
		'logo',
		'hero_image',
		'hero_text',
		'accent_color',
		'copyright_text',
		'address',
		'phone',
		'email',
		'smtp_host',
		'smtp_port',
		'smtp_secure',
		'smtp_username',
		'smtp_password'
	];
}
