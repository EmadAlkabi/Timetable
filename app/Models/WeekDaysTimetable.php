<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeekDaysTimetable extends Model
{
    protected $table = "week_days_timetable";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = ["level", "day", "lesson_1", "lesson_2", "lesson_3", "lesson_4"];
}
