@extends('Exams Dashboard.app')
@section('content')
    <div style="text-align: right" class="container-fluid">
        @if(Session::get('Success'))
            <div class="alert alert-success">{{Session::get('Success')}}</div>
        @endif
    <table class="table">
        <thead>
        <tr>
            <th></th>
            <th>تاريخ الطلب</th>
            <th>اسم المادة</th>
            <th>اسم الطالب</th>
            <th>الرقم الجامعي</th>
        </tr>
        </thead>
        <tbody>
        @foreach($objections as $one)
            <tr>
                <th scope="row">
                    <a type="button"
                       href="/exams/obj/details/{{$one->objId}}"
                       class="btn btn-outline-primary">تفاصيل الطلب</a></th>
                <td>{{$one->created_at->toDateString()}}</td>
                <td>{{$one->name}}</td>
                <td>{{$one->f_name}} {{$one->l_name}}</td>
                <td>{{$one->studentId}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
@endsection
