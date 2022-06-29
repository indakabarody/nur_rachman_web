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
 * @property string|null $header_image
 * @property string|null $copyright_text
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Setting extends Model
{
	protected $table = 'settings';

	protected $fillable = [
		'website_title',
		'logo',
		'header_image',
		'copyright_text'
	];
}
