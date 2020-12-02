<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Auth
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Player extends Authenticatable
{
	use Notifiable;
	protected $fillable = [
		'name',
		'password',
	];

	public function getAuthPassword() {
		return $this->password;
	}
}
