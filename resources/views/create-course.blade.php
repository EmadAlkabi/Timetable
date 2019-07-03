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

                <form class="w-100 border border-light p-5" method="post" action="/store-course">
                    @csrf()
                    <p class="h4 text-center mb-4">انشاء مادة دراسية</p>

                    <label for="name">المادة</label>
                    <input type="text" class="form-control mb-4" name="name" id="name" required>

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

                    <label for="no_of_lessons">عدد الدروس</label>
                    <input type="text" class="form-control mb-5" name="no_of_lessons" id="no_of_lessons" required>

                    <button class="btn btn-info btn-block my-2" type="submit">انشاء</button>
                    <a class="btn btn-black btn-block my-2" href="/">رجوع</a>
                </form>
            </div>
        </div>
    </div>
@endsection