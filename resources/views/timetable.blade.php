@extends("app")

@section("content")
    <div class="container p-3">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center">{{\App\Enum\Level::getLevel($timetable->level)}}</h2>

               <div class="row">
                   <div class="col-md-6">
                       <table class="table table-sm text-center table-bordered">
                           <caption class="h4 text-center text-secondary" style="caption-side: top;">الموسم الدراسي</caption>
                           <thead>
                           <tr>
                               <th>عدد الايام الكل</th>
                               <th>عدد ايام العطل</th>
                               <th>عدد ايام الدوام</th>
                           </tr>
                           </thead>
                           <tbody>
                           <tr>
                               <td>{{$countDays}}</td>
                               <td>{{$countDaysForDayOff}}</td>
                               <td>{{$countDays - $countDaysForDayOff}}</td>
                           </tr>
                           </tbody>
                       </table>

                       <table class="table table-sm text-center table-bordered">
                           <caption class="h4-responsive text-center text-secondary" style="caption-side: top;">المواد الدراسية</caption>
                           <thead>
                           <tr>
                               <th class="align-middle" rowspan="2">#</th>
                               <th class="align-middle" rowspan="2">المادة</th>
                               <th colspan="4">عدد الدروس</th>
                           </tr>

                           <tr>
                               <th>المطلوبة</th>
                               <th>المعطاة</th>
                               <th>المتبقية</th>
                               <th>الحدث</th>
                           </tr>
                           </thead>
                           <tbody>
                           @php $sum1 = $sum2 = $sum3 = 0; @endphp
                           @forelse($courses as $course)
                               <tr>
                                   <td>{{$course->id}}</td>
                                   <td>{{$course->name}}</td>
                                   <td>{{$course->no_of_lessons}}</td>
                                   <td>
                                       @php
                                           $count = $days->filter(function ($day) use ($course){
                                           return ($day->lesson_1==$course->name || $day->lesson_2==$course->name || $day->lesson_3==$course->name || $day->lesson_4==$course->name);
                                           })->count();
                                       @endphp
                                       {{$count}}
                                   </td>
                                   <td>{{$course->no_of_lessons-$count}}</td>
                                   <td><a href="/edit-course/{{$course->id}}">تعديل</a></td>
                                   @php
                                       $sum1 += $course->no_of_lessons;
                                       $sum2 += $count;
                                       $sum3 += ($course->no_of_lessons-$count);
                                   @endphp
                               </tr>
                           @empty
                               <tr>
                                   <td colspan="6" class="text-center">لاتوجد مواد للمرحلة الدراسية الحالية</td>
                               </tr>
                           @endforelse
                           </tbody>
                       </table>

                       <table class="table table-sm text-center table-bordered">
                           <caption class="h4-responsive text-center text-secondary" style="caption-side: top;">جدول بث الدروس الاسبوعي</caption>
                           <thead>
                           <tr>
                               <th class="align-middle" rowspan="2">اليوم</th>
                               <th colspan="4">الدروس</th>
                               <th class="align-middle" rowspan="2">الحدث</th>
                           </tr>

                           <tr>
                               <th>الاول</th>
                               <th>الثاني</th>
                               <th>الثالث</th>
                               <th>الرابع</th>
                           </tr>
                           </thead>
                           <tbody>
                           @forelse($weekDaysTimetable as $day)
                               <tr>
                                   <td>{{$day->day}}</td>
                                   <td>{{$day->lesson_1}}</td>
                                   <td>{{$day->lesson_2}}</td>
                                   <td>{{$day->lesson_3}}</td>
                                   <td>{{$day->lesson_4}}</td>
                                   <td><a href="">تعديل</a></td>
                               </tr>
                           @empty
                               <tr>
                                   <td colspan="6" class="text-center">لا يوجد جدول حاليا</td>
                               </tr>
                           @endforelse
                           </tbody>
                       </table>

                       <table class="table table-sm text-center table-bordered">
                           <caption class="h4-responsive text-center text-secondary" style="caption-side: top;">تفاصيل عدد الدروس</caption>
                           <thead>
                           <tr>
                               <th>الاقصى</th>
                               <th>الطلوبة</th>
                               <th>المعطاة</th>
                               <th>المتبقية</th>
                           </tr>
                           </thead>
                           <tbody>
                           <tr>
                               <td>{{($countDays - $countDaysForDayOff)*4}}</td>
                               <td>{{$sum1}}</td>
                               <td>{{$sum2}}</td>
                               <td>{{$sum3}}</td>
                           </tr>
                           </tbody>
                       </table>

                       <a class="btn btn-default btn-block mt-3" href="/timetable/fill?id={{$timetable->id}}">ملئ الجدول الدراسي</a>
                       <a class="btn btn-black btn-block my-2" href="/">رجوع</a>
                   </div>
                   <div class="col-md-6">
                       <table class="table table-sm text-center table-bordered">
                           <caption class="h4-responsive text-center text-secondary" style="caption-side: top;">الجدول الدراسي</caption>
                           <tbody>
                           @php $index = 0; @endphp
                           @forelse($days as $day)
                               @if(date("D", strtotime($day->date)) == "Sat")
                                   <tr>
                                       @php $index++; @endphp
                                       <td class="h4" colspan="5">{{"الاسبوع رقم " . $index}}</td>
                                   </tr>
                               @endif
                               <tr>
                                   @if($day->day_off == 1)
                                       <td class="d-flex flex-column">
                                           <span>{{date("D", strtotime($day->date))}}</span>
                                           <span>{{$day->date}}</span>
                                       </td>
                                       <td class="align-middle" colspan="4">يوم تعطيل</td>
                                   @else
                                       <td class="d-flex flex-column">
                                           <span>{{date("D", strtotime($day->date))}}</span>
                                           <span>{{$day->date}}</span>
                                       </td>
                                       <td class="align-middle">{{$day->lesson_1}}</td>
                                       <td class="align-middle">{{$day->lesson_2}}</td>
                                       <td class="align-middle">{{$day->lesson_3}}</td>
                                       <td class="align-middle">{{$day->lesson_4}}</td>
                                   @endif
                               </tr>
                           @empty
                               <tr>
                                   <td colspan="5" class="text-center">لاتوجد مواد للمرحلة الدراسية الحالية</td>
                               </tr>
                           @endforelse
                           </tbody>
                       </table>
                   </div>
               </div>
            </div>
        </div>
    </div>
@endsection