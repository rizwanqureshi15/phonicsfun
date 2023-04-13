<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
	protected $table = 'batches';

    protected $fillable = [
		'name', 'is_one_on_one', 'teacher_id', 'amount', 'course_id', 'tutor_rate', 'status'
	];

	public function course()
    {
        return $this->belongsTo('App\Models\Course', 'course_id');
    }

    public function students()
    {
        return $this->belongsToMany('App\Models\Student');
    }

    public function teacher()
    {
        return $this->belongsTo('App\Models\User', 'teacher_id');
    }
    
}