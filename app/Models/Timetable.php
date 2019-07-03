<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    protected $table = "timetable";
    protected $primaryKey = "id";
    public $timestamps = false;
}
