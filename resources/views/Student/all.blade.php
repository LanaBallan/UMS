@extends('layouts.app')
@section('content')



    <h1 class="text-center">All Student Information</h1>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone</th>
            <th>Email</th>

        </tr>
        </thead>
        <tbody>
        @foreach($students as $one)
            <tr>

                <td>{{$one->id}}</td>
                <td>{{$one->f_name}}</td>
                <td>{{$one->l_name}}</td>
                <td>{{$one->phone}}</td>
                <td>{{$one->email}}</td>




                <td>
                    <a type="button"
                       href="/student/delete/{{$one->id}}"
                       class="btn btn-outline-danger">Delete</a>


                </td>
                @endforeach
            </tr>
        </tbody>
    </table>
@endsection
