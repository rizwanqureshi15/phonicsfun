<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BatchStudent extends Model
{
    protected $table = 'batch_student';

    protected $fillable = [
		'batch_id', 'student_id'
	];
}
