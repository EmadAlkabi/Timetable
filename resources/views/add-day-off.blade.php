@extends("app")

@section("content")
    <div class="container p-5">
        <div class="row justify-content-center">
            <div class="col-6">
                @if (session('Message'))
                    <div class="alert alert-success text-center">
                        {{session('Message')}}
                    </div>
                @endif

                <form class="w-100 border border-light p-5" method="post" action="/store-day-off">
                    @csrf()
                    <p class="h4 text-center mb-4">اضافة عطلة</p>

                    <label for="timetable">اختر الجدول الدراسي</label>
                    <select class="browser-default custom-select mb-4" name="timetable" id="timetable" required>
                        @foreach($timetables as $timetable)
                            <option value="{{$timetable->id}}">{{"الجدول الدراسي " . \App\Enum\Level::getLevel($timetable->level)}}</option>
                        @endforeach
                    </select>

                    <label for="date">التاريخ</label>
                    <input type="date" class="form-control mb-5" name="date" id="date" required>

                    <button class="btn btn-info btn-block my-2" type="submit">اضافة</button>
                    <a class="btn btn-black btn-block my-2" href="/">رجوع</a>
                </form>
            </div>
        </div>
    </div>
@endsection