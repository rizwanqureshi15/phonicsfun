<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiToken extends Model
{
	protected $table = 'api_tokens';

    protected $fillable = [
		'token',
		'user_id',
		'expired_on',
	];
}