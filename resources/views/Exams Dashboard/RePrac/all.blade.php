@extends('Exams Dashboard.app')
@section('content')
    <div style="text-align: right" class="container-fluid">
    <table class="table">
        <thead>
        <tr>

            <th>تاريخ الطلب</th>
            <th>اسم المادة</th>
            <th>اسم الطالب</th>
            <th>الرقم الجامعي</th>
        </tr>
        </thead>
        <tbody>
        @foreach($reprac as $one)
            <tr>
                <td>{{$one->date}}</td>
                <td>{{$one->name}}</td>
                <td>{{$one->f_name}} {{$one->l_name}}</td>
                <td>{{$one->studentId}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
        <div style="text-align: right" class="container-fluid">
@endsection
