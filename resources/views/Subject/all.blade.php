@extends('layouts.app')
@section('content')



<h1 class="text-center">All Restaurant Information</h1>
<table class="table table-bordered">
    <thead>
    <tr>

        <th>Name</th>
        <th>Year</th>
        <th>Specialization</th>
        <th>Max Practical Mark</th>
        <th>Max Theoretical Mark</th>

    </tr>
    </thead>
    <tbody>
    @foreach($subjects as $one)
        <tr>


            <td>{{$one->name}}</td>
            <td>{{$one->year}}</td>
            <td>{{$one->specialization}}</td>
            <td>{{$one->max_practical}}</td>
            <td>{{$one->max_theoretical}}</td>

            <td>
                <a type="button"
                   href="/subject/delete/{{$one->id}}"
                   class="btn btn-outline-danger">Delete</a>

                <a type="button"
                   href="/subject/edit/{{$one->id}}"
                   class="btn btn-outline-success">Edit</a>
            </td>
            @endforeach
        </tr>
    </tbody>
</table>
@endsection
