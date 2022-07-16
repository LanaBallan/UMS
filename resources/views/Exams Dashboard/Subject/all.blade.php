@extends('Exams Dashboard.app')
@section('content')



<h1 class="text-center">معلومات جميع المواد</h1>
<table class="table table-bordered text-center">
    <thead>
    <tr>

        <th>علامة النظري العظمى</th>
        <th>علامة العملي العظمى</th>
        <th>التخصص</th>
        <th>السنة</th>
        <th>الاسم</th>
    </tr>
    </thead>
    <tbody>
    @foreach($subjects as $one)
        <tr>

            <td>
                <a type="button"
                   href="/exams/subject/delete/{{$one->id}}"
                   class="btn btn-outline-danger">حذف</a>

                <a type="button"
                   href="/exams/subject/edit/{{$one->id}}"
                   class="btn btn-outline-success">تعديل</a>
            </td>

            <td>{{$one->max_theoretical}}</td>
            <td>{{$one->max_practical}}</td>
            <td>{{$one->specialization}}</td>
            <td>{{$one->year}}</td>
            <td>{{$one->name}}</td>

            @endforeach
        </tr>
    </tbody>
</table>
@endsection
