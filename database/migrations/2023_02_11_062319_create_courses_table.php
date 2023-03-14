<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('categori_id')->unsigned();
            $table->string('age_group');
            $table->integer('classes_per_week');
            $table->integer('total_classes');
            $table->string('sheets');
            $table->boolean('reading_material')->default(true);
            $table->boolean('comprehensive_practice')->default(true);
            $table->string('sight_words');
            $table->string('writing_activity');
            $table->string('cost_per_class');
            $table->string('duration');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
