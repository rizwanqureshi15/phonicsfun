<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = [
		'name', 'parent_id'
	];

	public function user()
    {
        return $this->belongsTo('App\Models\User', 'parent_id');
    }
}
