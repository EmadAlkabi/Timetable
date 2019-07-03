@extends("app")

@section("content")
    <div class="container p-3">
        @if (session('Message'))
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-success text-center">
                        {{session('Message')}}
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-12">
                <a class="btn btn-default" href="/create-timetable">انشاء جدول دراسي</a>
                <a class="btn btn-default" href="/add-day-off">اضافة عطلة</a>
                <a class="btn btn-default" href="/create-course">انشاء مادة دراسية</a>
                <a class="btn btn-default" href="/add-day-week-days-timetable">اضافة يوم لجدول بث الدروس الاسبوعي</a>
            </div>
        </div>

        <div class="row pt-3">
            <div class="col-12">
                @forelse($timetables as $timetable)
                    <a class="btn btn-primary" href="/timetable?id={{$timetable->id}}">
                        <span>الجدول الدراسي</span>
                        <span>{{\App\Enum\Level::getLevel($timetable->level)}}</span>
                    </a>
                @empty
                    <h3 class="text-center">لاتوجد جداول دراسية حاليا</h3>
                @endforelse
            </div>
        </div>
    </div>
@endsection