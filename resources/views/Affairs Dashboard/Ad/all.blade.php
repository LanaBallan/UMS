@extends('Affairs Dashboard.app')
@section('content')



    <h1 class="text-center">معلومات جميع الإعلانات</h1>
    <table class="table table-bordered text-center">
        <thead>
        <tr>
            <th></th>
            <th>التاريخ</th>
            <th>نص الإعلان</th>
        </tr>
        </thead>
        <tbody>
        @foreach($ads as $one)
            <tr>
                <td>
                    <a type="button"
                       href="/affairs/ad/delete/{{$one->id}}"
                       class="btn btn-outline-danger">حذف</a>

                    <a type="button"
                       href="/affairs/ad/edit/{{$one->id}}"
                       class="btn btn-outline-success">تعديل</a>

                <td>{{$one->date}}</td>
                <td>{{$one->description}}</td>



                @endforeach
            </tr>
        </tbody>
    </table>
@endsection
