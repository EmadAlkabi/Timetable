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

                <form class="w-100 border border-light p-5" method="post" action="/store-day-week-days-timetable">
                    @csrf()
                    <p class="h4 text-center mb-4">اضافة يوم لجدول بث الدروس الاسبوعي</p>

                    <label for="level">اختر المرحلة الدراسية</label>
                    <select class="browser-default custom-select mb-4" name="level" id="level" required>
                        <option value="{{\App\Enum\Level::BEGINNER}}">{{\App\Enum\Level::getLevel(\App\Enum\Level::BEGINNER)}}</option>
                        <option value="{{\App\Enum\Level::INTRO_FIRST_PART_ONE}}">{{\App\Enum\Level::getLevel(\App\Enum\Level::INTRO_FIRST_PART_ONE)}}</option>
                        <option value="{{\App\Enum\Level::INTRO_FIRST_PART_TWO}}">{{\App\Enum\Level::getLevel(\App\Enum\Level::INTRO_FIRST_PART_TWO)}}</option>
                        <option value="{{\App\Enum\Level::INTRO_SECOND_PART_ONE}}">{{\App\Enum\Level::getLevel(\App\Enum\Level::INTRO_SECOND_PART_ONE)}}</option>
                        <option value="{{\App\Enum\Level::INTRO_SECOND_PART_TWO}}">{{\App\Enum\Level::getLevel(\App\Enum\Level::INTRO_SECOND_PART_TWO)}}</option>
                        <option value="{{\App\Enum\Level::INTRO_THIRD_PART_ONE}}">{{\App\Enum\Level::getLevel(\App\Enum\Level::INTRO_THIRD_PART_ONE)}}</option>
                        <option value="{{\App\Enum\Level::INTRO_THIRD_PART_TWO}}">{{\App\Enum\Level::getLevel(\App\Enum\Level::INTRO_THIRD_PART_TWO)}}</option>
                    </select>

                    <label for="day">اختر اليوم</label>
                    <select class="browser-default custom-select mb-4" name="day" id="day" required>
                        <option value="Sat">السبت</option>
                        <option value="Sun">الاحد</option>
                        <option value="Mon">الاثنين</option>
                        <option value="Tue">الثلاثاء</option>
                        <option value="Wed">الاربعاء</option>
                    </select>

                    <label for="lesson_1">الدرس الاول</label>
                    <select class="browser-default custom-select mb-4" name="lesson_1" id="lesson_1" required>
                        <option value="الفقه">الفقه</option>
                        <option value="العقائد">العقائد</option>
                        <option value="المنطق">المنطق</option>
                        <option value="النحو">النحو</option>
                        <option value="التفسير">التفسير</option>
                        <option value="الاخلاق">الاخلاق</option>
                    </select>

                    <label for="lesson_2">الدرس الثاني</label>
                    <select class="browser-default custom-select mb-4" name="lesson_2" id="lesson_2" required>
                        <option value="الفقه">الفقه</option>
                        <option value="العقائد">العقائد</option>
                        <option value="المنطق">المنطق</option>
                        <option value="النحو">النحو</option>
                        <option value="التفسير">التفسير</option>
                        <option value="الاخلاق">الاخلاق</option>
                    </select>

                    <label for="lesson_3">الدرس الثالث</label>
                    <select class="browser-default custom-select mb-4" name="lesson_3" id="lesson_3" required>
                        <option value="الفقه">الفقه</option>
                        <option value="العقائد">العقائد</option>
                        <option value="المنطق">المنطق</option>
                        <option value="النحو">النحو</option>
                        <option value="التفسير">التفسير</option>
                        <option value="الاخلاق">الاخلاق</option>
                    </select>

                    <label for="lesson_4">الدرس الرابع</label>
                    <select class="browser-default custom-select mb-4" name="lesson_4" id="lesson_4" required>
                        <option value="الفقه">الفقه</option>
                        <option value="العقائد">العقائد</option>
                        <option value="المنطق">المنطق</option>
                        <option value="النحو">النحو</option>
                        <option value="التفسير">التفسير</option>
                        <option value="الاخلاق">الاخلاق</option>
                    </select>

                    <button class="btn btn-info btn-block my-2" type="submit">اضافة</button>
                    <a class="btn btn-black btn-block my-2" href="/">رجوع</a>
                </form>
            </div>
        </div>
    </div>
@endsection