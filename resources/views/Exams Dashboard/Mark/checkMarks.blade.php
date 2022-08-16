@extends('Exams Dashboard.app')
@section('content')

    <div style="text-align: right" class="container-fluid">
    <h1 class="text-center">علامات غير مدققة</h1>
        <form action="/exams/mark/confirm" method="Post">
            @if(Session::get('Success'))
                <div class="alert alert-success">{{Session::get('Success')}}</div>
            @endif
            @csrf
    <table style="text-align: center" class="table table-bordered">
        <thead>
        <tr>

            <th>العلامة الكاملة</th>
            <th>علامة النظري</th>
            <th>علامة العملي</th>
            <th>اسم المادة</th>
            <th>اسم الطالب</th>
            <th>الرقم الجامعي</th>
        </tr>
        </thead>
        <tbody>
        @foreach($marks as $one)
            <tr>
                <input type="text" name="id[]" value="{{$one->markId}}" hidden="">
                <input type="text" name="studentIds[]" value="{{$one->studentId}}" hidden="">
                <td>{{$one->total_mark}}</td>
                <td>{{$one->theoretical_mark}}</td>
                <td>{{$one->practical_mark}}</td>
                <td>{{$one->subjectName}}</td>
                <td>{{$one->f_name}} {{$one->l_name}}</td>
                <td>{{$one->studentId}}</td>

                @endforeach
            </tr>
        </tbody>
    </table>
    <button style="text-align: right;" type="submit" class="btn btn-primary">تأكيد</button>
        </form>
    </div>
@endsection
