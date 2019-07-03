<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

route::get("", "MainController@index");


route::get("/create-timetable", "MainController@createTimetable");
route::post("/store-timetable", "MainController@storeTimetable");

route::get("/add-day-off", "MainController@addDayOff");
route::post("/store-day-off", "MainController@storeDayOff");

route::get("/create-course", "MainController@createCourse");
route::post("/store-course", "MainController@storeCourse");

route::get("/edit-course/{id}", "MainController@editCourse");
route::post("/update-course/{id}", "MainController@updateCourse");

route::get("/add-day-week-days-timetable", "MainController@addDaysForWeekDaysTimetable");
route::post("/store-day-week-days-timetable", "MainController@storeDaysForWeekDaysTimetable");

route::get("/timetable", "MainController@timetable");
route::get("/timetable/fill", "MainController@fill");