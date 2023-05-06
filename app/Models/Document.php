<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'documents';

    protected $fillable = [
		'name', 'teacher_id', 'lesson_id'
	];

	public function teacher()
    {
        return $this->belongsTo('App\Models\User', 'teacher_id');
    }

    public function lesson()
    {
        return $this->belongsTo('App\Models\Lesson', 'lesson_id');
    }
}