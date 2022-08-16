@extends('Affairs Dashboard.app')
@section('content')

    <!-- Begin Page Content -->
    <div style="text-align: right" class="container-fluid">

        <!-- Page Heading -->
        <h1 class="text-center">إضافة سجل حياة جامعية</h1>

        <form action="/affairs/uniInfo/store" method="POST">
            @if(Session::get('Success'))
                <div class="alert alert-success">{{Session::get('Success')}}</div>
            @endif
            @csrf

            <div class="form-group">
                <label for="student_id">:رقم الطالب</label>
                <input style="text-align: right" type="number" class="form-control" id="student_id" placeholder="أدخل رقم الطالب الجامعي" name="student_id" required>
            </div>
            <div class="form-group">
                <label for="specialization">:التخصص</label>
                <select style="text-align: right" class="form-control" name="specialization" id="specialization">
                    <option value="علوم اساسية">علوم اساسية</option>
                    <option value="برمجيات">برمجيات</option>
                    <option value="شبكات">شبكات</option>
                    <option value="ذكاء">ذكاء</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status">:الحالة</label>
                <select style="text-align: right" class="form-control" name="status" id="status">
                    <option value="ناجح">ناجح</option>
                    <option value="راسب">راسب</option>
                    <option value="منقول">منقول</option>
                </select>
            </div>
            <button style="text-align: right" type="submit" class="btn btn-primary">إضافة</button>
        </form>
    </div>






@endsection
