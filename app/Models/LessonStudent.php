<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LessonStudent extends Model
{
    protected $table = 'lesson_student';

    protected $fillable = [
		'lesson_id', 'student_id', 'attendance'
	];

	// attendance
	// 0: not present , 1: present
}
