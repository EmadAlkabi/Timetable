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

                <form class="w-100 border border-light p-5" method="post" action="/update-course/{{$course->id}}">
                    @csrf()
                    <p class="h4 text-center mb-4">تحرير المادة الدراسية</p>

                    <label for="name">المادة</label>
                    <input type="text" class="form-control mb-4" name="name" value="{{$course->name}}" id="name" required>

                    <label for="no_of_lessons">عدد الدروس</label>
                    <input type="text" class="form-control mb-5" name="no_of_lessons" value="{{$course->no_of_lessons}}" id="no_of_lessons" required>

                    <button class="btn btn-info btn-block my-2" type="submit">حفظ التعديلات</button>
                    <a class="btn btn-black btn-block my-2" href="/">رجوع</a>
                </form>
            </div>
        </div>
    </div>
@endsection