<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
	protected $table = 'lessons';

    protected $fillable = [
		'batch_id', 'teacher_id', 'course_id', 'start_time', 'end_time', 'date', 'status'
	];

	// status
	// 0: pending, 1: active, 2: cancelled, 3: completed
	public function course()
    {
        return $this->belongsTo('App\Models\Course', 'course_id');
    }

    public function batch()
    {
        return $this->belongsTo('App\Models\Batch', 'batch_id');
    }

    public function students()
    {
        return $this->belongsToMany('App\Models\Student');
    }

    public function documents()
    {
        return $this->hasMany('App\Models\Document', 'lesson_id');
    }

    


    public static function getStatusName($status){
        $name = 'Pending';
        switch ($status) {
            case '0':
                $name = 'Pending';
                break;
            case '1':
                $name = 'Active';
                break;
            case '2':
                $name = 'Cancelled';
                break;
            case '3':
                $name = 'Completed';
                break;
            
        }

        return $name;
    }

}