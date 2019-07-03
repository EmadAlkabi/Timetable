<?php

namespace App\Http\Controllers;

use App\Enum\Level;
use App\Models\Course;
use App\Models\Day;
use App\Models\Timetable;
use App\Models\WeekDaysTimetable;
use Cron\DayOfMonthField;
use Illuminate\Support\Facades\Input;

class MainController extends Controller
{
    public function index()
    {
        $timetables = Timetable::all();
        return view("index")->with([
            "timetables" => $timetables
        ]);
    }

    public function createTimetable()
    {
        return view("create-timetable");
    }

    public function storeTimetable()
    {
        $timetable = new Timetable();
        $timetable->start_date = Input::get("from");
        $timetable->end_date = Input::get("to");
        $timetable->level = Input::get("level");
        $timetable->save();

        self::createDays($timetable);

        return redirect("/")->with([
            "Message" => "تم انشاء الجدول الدراسي"
        ]);
    }

    public static function createDays($timetable)
    {
        $dates = self::date_range($timetable->start_date, $timetable->end_date, "+1 day", "Y-m-d");
        foreach ($dates as $date) {
            $days_off = array("Thu", "Fri");
            $day_off = in_array(date('D', strtotime($date)), $days_off);

            $day = new Day();
            $day->timetable = $timetable->id;
            $day->date = $date;
            $day->day_off = ($day_off == true) ? 1 : 0;
            $day->save();
        }
    }

    public static function date_range($first, $last, $step, $output_format)
    {

        $dates = array();
        $current = strtotime($first);
        $last = strtotime($last);

        while ($current <= $last) {

            $dates[] = date($output_format, $current);
            $current = strtotime($step, $current);
        }

        return $dates;
    }

    public function addDayOff()
    {
        $timetables = Timetable::all();
        return view("add-day-off")->with([
            "timetables" => $timetables
        ]);
    }

    public function storeDayOff()
    {
        $timetable = Input::get("timetable");
        $date = Input::get("date");
        $day = Day::where("timetable", $timetable)
            ->where("date", $date)
            ->update(["day_off" => 1]);

        return redirect("/add-day-off")->with([
            "Message" => "تم انشاء الجدول الدراسي"
        ]);
    }

    public function createCourse()
    {
        return view("create-course");
    }

    public function storeCourse()
    {
        $course = new Course();
        $course->name = Input::get("name");
        $course->level =  (integer)Input::get("level");
        $course->no_of_lessons = (integer)Input::get("no_of_lessons");
        $course->save();

        return redirect("/create-course")->with([
            "Message" => "تم انشاء المادة الدراسية"
        ]);
    }

    public function editCourse($id)
    {
        $course = Course::findOrFail($id);
        return view("edit-course")->with([
            "course" => $course
        ]);
    }

    public function updateCourse($id)
    {
        $course = Course::findOrFail($id);
        $course->name = Input::get("name");
        $course->no_of_lessons = (integer)Input::get("no_of_lessons");
        $course->save();

        return redirect("/edit-course/$course->id")->with([
            "Message" => "تم تعديل المادة الدراسية"
        ]);
    }

    public function timetable()
    {
        $id = Input::get("id");
        $timetable = Timetable::findOrFail($id);
        $courses = Course::where("level", $timetable->level)->get();

        $days = Day::where("timetable", $timetable->id)
            ->get();

        $countDays = $days->count();

        $countDaysForDayOff = $days->filter(function ($day){
            return $day->day_off == 1;})
            ->count();

        $weekDaysTimetable = WeekDaysTimetable::where("level", $timetable->level)
            ->get();

        return view("timetable")->with([
            "timetable" => $timetable,
            "courses" => $courses,
            "countDays" => $countDays,
            "countDaysForDayOff" => $countDaysForDayOff,
            "days" => $days,
            "weekDaysTimetable" => $weekDaysTimetable
        ]);
    }

    public function fill()
    {
        $id = Input::get("id");
        $timetable = Timetable::findOrFail($id);
        Day::where("timetable", $timetable->id)
            ->where("day_off", 0)
            ->update([
                "lesson_1" => null,
                "lesson_2" => null,
                "lesson_3" => null,
                "lesson_4" => null,
                ]);
        $days = Day::where("timetable", $timetable->id)
            ->where("day_off", 0)
            ->get();
        $courses = Course::where("level", $timetable->level)
            ->orderBy("no_of_lessons", "DESC")
            ->get();
        $weekDaysTimetable = self::getWeekDaysTimetable($timetable->level);

        foreach ($courses as $course)
        {
            $count = 0;
            foreach ($days as $day)
            {
                $dayName = date('D', strtotime($day->date));
                if (in_array($course->name, $weekDaysTimetable[$dayName]))
                {
                    if ($count >= $course->no_of_lessons)
                        break;

                    $count++;

                    if (is_null($day->lesson_1))
                        $day->lesson_1 = $course->name;
                    elseif (is_null($day->lesson_2))
                        $day->lesson_2 = $course->name;
                    elseif (is_null($day->lesson_3))
                        $day->lesson_3 = $course->name;
                    elseif (is_null($day->lesson_4))
                        $day->lesson_4 = $course->name;
                }
                $day->save();
            }
        }

        return redirect("/timetable?id=$id");
    }

    public static function getWeekDaysTimetable($level)
    {
        $weekDaysTimetable = WeekDaysTimetable::where("level", $level)->get();
        $aryWeekDaysTimetable = array();
        foreach ($weekDaysTimetable as $day)
            $aryWeekDaysTimetable += array($day->day => array($day->lesson_1, $day->lesson_2, $day->lesson_3, $day->lesson_4));
        return $aryWeekDaysTimetable;
    }

    public function addDaysForWeekDaysTimetable()
    {
        return view("add-day-week-days-timetable");
    }

    public function storeDaysForWeekDaysTimetable()
    {
        WeekDaysTimetable::updateOrCreate(
            [
                'level' => Input::get('level'),
                'day' => Input::get('day')
            ],
            [
                'lesson_1' => Input::get("lesson_1"),
                'lesson_2' => Input::get("lesson_2"),
                'lesson_3' => Input::get("lesson_3"),
                'lesson_4' => Input::get("lesson_4")
            ]
        );

        return redirect("/add-day-week-days-timetable")->with([
            "Message" => "تمت الاضافة الى جدول بث الدروس"
        ]);
    }
}
