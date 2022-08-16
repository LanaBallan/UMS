@extends('Affairs Dashboard.app')
@section('content')

    <!-- Begin Page Content -->
    <div style="text-align: right" class="container-fluid">

        <!-- Page Heading -->
        <h1 class="text-center">شحن النقاط</h1>

        <form action="/affairs/points/store" method="POST">
            @if(Session::get('Success'))
                <div class="alert alert-success">{{Session::get('Success')}}</div>
            @endif
            @csrf

            <div class="form-group">
                <label for="student_id">:رقم الطالب</label>
                <input style="text-align: right" type="number" class="form-control" id="student_id" placeholder="أدخل رقم الطالب الجامعي" name="student_id" required>
            </div>
                <div class="form-group">
                    <label for="point">:النقاط</label>
                    <input style="text-align: right" type="number" class="form-control" id="point" placeholder="أدخل عدد النقاط" name="point" required>
                </div>
            <button style="text-align: right" type="submit" class="btn btn-primary">إضافة</button>
        </form>
    </div>

@endsection
