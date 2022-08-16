@extends('Exams Dashboard.app')
@section('content')

    <h1 class="text-center">علامات غير مدققة</h1>
    @if(Session::get('Success'))
        <div class="alert alert-success">{{Session::get('Success')}}</div>
    @endif
    <table style="text-align: center" class="table table-bordered">
        <thead>
        <tr>
            <th></th>
            <th>اسم المادة</th>
        </tr>
        </thead>
        <tbody>
        @foreach($subjects as $one)
            <tr>
                <td>
                    <a type="button"
                       href="/exams/mark/check/marks/{{$one->subjectId}}"
                       class="btn btn-outline-success">تفاصيل العلامات</a>

                </td>
                <td>{{$one->subjectName}}</td>


                @endforeach
            </tr>
        </tbody>
    </table>


@endsection
