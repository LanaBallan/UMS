@extends('Affairs Dashboard.app')
@section('content')
    <table class="table">
        <tbody>
        @foreach($requests as $one)
        <tr>
            <th scope="row"> <a type="button"
                    href="/affairs/document-requests/confirm/{{$one->id}}"
                    class="btn btn-outline-success">تأكيد</a>
                <a type="button"
                   href="/affairs/document-requests/details/{{$one->id}}"
                   class="btn btn-outline-primary">المزيد</a></th>
            <td>{{$one->created_at->toDateString()}}</td>

            <td>{{$one->type}}</td>
            <td>{{$one->get_student->f_name}} {{$one->get_student->l_name}}</td>
            <td>{{$one->id}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
