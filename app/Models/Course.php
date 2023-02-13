<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
	protected $table = 'courses';

    protected $fillable = [
		'name', 'description', 'is_active', 'category_id', 'age_group', 'classes_per_week', 'total_classes', 'sheets', 'reading_material',
		'sight_words', 'writing_activity', 'cost_per_class', 'duration', 'image', 'comprehensive_practice'
	];

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
}