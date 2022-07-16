@extends('Exams Dashboard.app')
@section('content')

    <!-- Begin Page Content -->
    <div style="text-align: right" class="container-fluid">

        <h1 class="text-center">إضافة علامة</h1>

        <form action="/exams/mark/store" method="POST">
            @csrf

            <div class="form-group">
                <label for="student_id">:رقم الطالب</label>
                <input style="text-align: right" type="number" class="form-control" id="student_id" placeholder="أدخل رقم الطالب الجامعي" name="student_id" required>
            </div>
            <div class="form-group">
                <label for="subject_id">:المادة</label>
                <select style="text-align: right" class="form-control" name="subject_id" id="subject_id">
                    @foreach($subjects as $one)
                    <option value="{{$one->id}}">{{$one->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="form-group">
                        <label for="practical_mark">:علامة العملي</label>
                        <input style="text-align: right" type="number" class="form-control" id="practical_mark" placeholder="أدخل علامة العملي" name="practical_mark" required>
                    </div>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="form-group">
                        <label for="theoretical_mark">علامة النظري</label>
                        <input style="text-align: right" type="number" class="form-control" id="theoretical_mark" placeholder="أدخل علامة النظري" name="theoretical_mark" required>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="form-group">
                        <label for="year">:السنة</label>
                        <input style="text-align: right" type="number" class="form-control" id="year" placeholder="أدخل السنة التي تقدم بها الطالب" name="year" required>
                    </div>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="form-group">
                        <label for="semester">:الفصل الدراسي</label>
                        <select style="text-align: right" class="form-control" name="semester" id="semester">

                            <option value="1">الفصل الأول</option>
                            <option value="2">الفصل الثاني</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">إضافة</button>
        </form>
    </div>



    <!-- /.container-fluid -->


    <!-- End of Main Content -->
@endsection
