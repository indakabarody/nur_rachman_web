<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class User
 *
 * @property int $id
 * @property string $name
 * @property string|null $image
 * @property string|null $role
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|About[] $abouts
 * @property Collection|Education[] $education
 * @property Collection|Page[] $pages
 * @property Collection|Post[] $posts
 *
 * @package App\Models
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

	protected $table = 'users';

	protected $dates = [
		'email_verified_at'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'image',
		'role',
		'email',
		'email_verified_at',
		'password',
		'remember_token'
	];

	public function abouts()
	{
		return $this->hasMany(About::class);
	}

	public function education()
	{
		return $this->hasMany(Education::class);
	}

	public function pages()
	{
		return $this->hasMany(Page::class);
	}

	public function posts()
	{
		return $this->hasMany(Post::class);
	}
}