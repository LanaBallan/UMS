@extends('Exams Dashboard.app')
@section('content')



    <h1 class="text-center">معلومات جميع العلامات</h1>
    <table class="table table-bordered">
        <thead>
        <tr>

           <th>مؤكد</th>
            <th>الفصل</th>
            <th>السنة</th>
            <th>الحالة</th>
            <th>العلامة الكاملة</th>
            <th>علامة النظري</th>
            <th>علامة العملي</th>
            <th>الرقم الجامعي</th>
            <th>اسم الطالب</th>
            <th>اسم المادة</th>
        </tr>
        </thead>
        <tbody>
        @foreach($marks as $one)
            <tr>
                <td>
                    <a type="button"
                       href="/exams/mark/delete/{{$one->id}}"
                       class="btn btn-outline-danger">حذف</a>

                    <a type="button"
                       href="/exams/mark/edit/{{$one->id}}"
                       class="btn btn-outline-success">تعديل</a>
                </td>
                @if($one->confirmed=='0')
                    <td>غير مؤكد</td>
                @else
                    <td>مؤكد</td>
                @endif
                @if($one->semester=='1')
                <td>الأول</td>
                @else
                    <td>الثاني</td>
                @endif
                <td>{{$one->year}}</td>
                <td>{{$one->status}}</td>
                <td>{{$one->total_mark}}</td>
                <td>{{$one->theoretical_mark}}</td>
                <td>{{$one->practical_mark}}</td>
                <td>{{$one->student_id}}</td>
                <td>{{$one->get_student->f_name}} {{$one->get_student->l_name}}</td>
                <td>{{$one->get_subject->name}}</td>



                @endforeach
            </tr>
        </tbody>
    </table>
@endsection
