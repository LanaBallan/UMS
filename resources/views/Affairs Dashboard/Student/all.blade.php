@extends('Affairs Dashboard.app')
@section('content')


    <div style="text-align: right" class="container-fluid">
    <h1 class="text-center">معلومات الطلاب</h1>
    <div class="dropdown">
        <button style="color: #2B96CC" type="button" class="btn  dropdown-toggle" data-toggle="dropdown">
           ترتيب الطلاب
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="/affairs/students/name/sort">حسب الاسم</a>
            <a class="dropdown-item" href="/affairs/students/avg/sort">حسب المعدل</a>

        </div>
    </div>

    <table class="table table-bordered text-center">
        <thead>
        <tr>
            <th></th>
            <th>البريد الالكتروني</th>
            <th>رقم الهاتف</th>
            <th>اسم العائلة</th>
            <th>الاسم</th>
            <th>الرقم الجامعي</th>

        </tr>
        </thead>
        <tbody>
        @foreach($students as $one)
            <tr>
                <td>
                    <a type="button"
                       href="/affairs/student/delete/{{$one->studentId}}"
                       class="btn btn-outline-danger">حذف</a>

                </td>
                <td>{{$one->email}}</td>
                <td>{{$one->phone}}</td>
                <td>{{$one->l_name}}</td>
                <td>{{$one->f_name}}</td>
                <td>{{$one->studentId}}</td>








                @endforeach
            </tr>
        </tbody>
    </table>
    </div>
@endsection
