@extends('Exams Dashboard.app')
@section('content')

    <!-- Begin Page Content -->
    <div style="text-align: right" class="container-fluid">

        <h1 class="text-center">قوائم العلامات</h1>

        <form action="/exams/mark/export" method="Get">
            @csrf

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <div class="form-group">
                                <label for="specialization">:التخصص</label>
                                <select style="text-align: right" class="form-control" name="specialization" id="specialization">
                                    <option value="علوم اساسية">علوم اساسية</option>
                                    <option value="برمجيات">برمجيات</option>
                                    <option value="شبكات">شبكات</option>
                                    <option value="ذكاء">ذكاء</option>
                                </select>
                            </div>
                        </div>
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
                    </div>

            <div class="form-group row">

                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="form-group">
                        <label for="semester">:الفصل الدراسي</label>
                        <select style="text-align: right" class="form-control" name="semester" id="semester">

                            <option value="1">الفصل الأول</option>
                            <option value="2">الفصل الثاني</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="form-group">
                        <label for="year">:السنة</label>
                        <input style="text-align: right" type="number" class="form-control" id="year" placeholder="أدخل السنة التي تقدم بها الطالب" name="year" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">تصدير</button>
        </form>
    </div>



    <!-- /.container-fluid -->


    <!-- End of Main Content -->
@endsection
