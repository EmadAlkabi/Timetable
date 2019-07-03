@extends("app")

@section("content")
    <div class="container p-5">
        <div class="row justify-content-center">
            <div class="col-6">
                <form class="w-100 border border-light p-5" method="post" action="/store-timetable">
                    @csrf()
                    <p class="h4 text-center mb-4">انشاء الجدول الدراسي</p>

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

                    <label for="from">من تاريخ</label>
                    <input type="date" class="form-control mb-4" name="from" id="from" required>

                    <label for="to">الى تاريخ</label>
                    <input type="date" class="form-control mb-5" name="to" id="to" required>

                    <button class="btn btn-info btn-block my-2" type="submit">انشاء</button>
                    <a class="btn btn-black btn-block my-2" href="/">رجوع</a>
                </form>
            </div>
        </div>
    </div>
@endsection