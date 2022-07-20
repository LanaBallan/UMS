@extends('Exams Dashboard.app')
@section('content')

    <!-- Begin Page Content -->
    <div style="text-align: right" class="container-fluid">

        <h1 class="text-center">إضافة علامة</h1>

        <form action="/exams/mark/store" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">

                <input style="text-align: right" id="file" type="file" class="form-control form-control-user "
                       name="file"  required
                       placeholder="Personal Photo" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="form-group">
                        <label for="subject_id">:المادة</label>
                        <select style="text-align: right" class="form-control" name="subject_id" id="subject_id">
                            @foreach($subjects as $one)
                                <option value="{{$one->id}}">{{$one->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="form-group">
                        <label for="mark_type">نوع العلامة</label>
                        <select style="text-align: right" class="form-control" name="mark_type" id="mark_type">

                            <option value="عملي">عملي</option>
                            <option value="نظري">نظري</option>
                        </select>
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
