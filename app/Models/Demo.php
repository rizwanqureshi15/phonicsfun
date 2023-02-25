<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demo extends Model
{
	protected $table = 'demos';

    protected $fillable = [
		'parent_name', 'email', 'phone', 'kid_name', 'kid_age', 'course_id', 'note'
	];

	public function course()
    {
        return $this->belongsTo('App\Models\Course', 'course_id');
    }
}