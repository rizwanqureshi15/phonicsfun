<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demo extends Model
{
	protected $table = 'courses';

    protected $fillable = [
		'parent_name', 'email', 'phone', 'kid_name', 'kid_age', 'course_id', 'note'
	];
}