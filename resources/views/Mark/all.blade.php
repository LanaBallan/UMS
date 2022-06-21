@extends('layouts.app')
@section('content')



    <h1 class="text-center">All Marks Information</h1>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Subject Name</th>
            <th>Student Name</th>
            <th>Student ID</th>
            <th>Practical Mark</th>
            <th>Theoretical Mark</th>
            <th>Total Mark</th>
            <th>status</th>
            <th>Year</th>
            <th>Semester</th>
           <th>Confirmed</th>
        </tr>
        </thead>
        <tbody>
        @foreach($marks as $one)
            <tr>

                <td>{{$one->id}}</td>
                <td>{{$one->get_subject->name}}</td>
                <td>{{$one->get_student->f_name}} {{$one->get_student->l_name}}</td>
                <td>{{$one->student_id}}</td>
                <td>{{$one->practical_mark}}</td>
                <td>{{$one->theoretical_mark}}</td>
                <td>{{$one->total_mark}}</td>
                <td>{{$one->status}}</td>
                <td>{{$one->year}}</td>
                <td>{{$one->semester}}</td>
                @if($one->confirmed=='0')
                    <td>Not Confirmed</td>
                @else
                    <td>Confirmed</td>
                @endif



                <td>
                    <a type="button"
                       href="/mark/delete/{{$one->id}}"
                       class="btn btn-outline-danger">Delete</a>

                    <a type="button"
                       href="/mark/edit/{{$one->id}}"
                       class="btn btn-outline-success">Edit</a>
                </td>
                @endforeach
            </tr>
        </tbody>
    </table>
@endsection
