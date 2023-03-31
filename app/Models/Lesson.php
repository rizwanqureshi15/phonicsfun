<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
	protected $table = 'lessons';

    protected $fillable = [
		'student_id', 'batch_id', 'teacher_id', 'course_id', 'start_time', 'end_time', 'date', 'status', 'attendance'
	];

	// status
	// 0: pending, 1: active, 2: cancelled
	public function course()
    {
        return $this->belongsTo('App\Models\Course', 'course_id');
    }

    public function batch()
    {
        return $this->belongsTo('App\Models\Batch', 'batch_id');
    }
}