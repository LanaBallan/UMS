@extends('layouts.app')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Subject</h1>

        </div>

        <form action="/subject/edit/{{$subject->id}}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Name"
                       name="name" value="{{$subject->name}}" required>
            </div>
            <div class="form-group">
                <label for="year">Year:</label>
                <input type="number" class="form-control" id="year" placeholder="Enter Year"
                       name="year" value="{{$subject->year}}" required>
            </div>
            <div class="form-group">
                <label for="specialization">Specialization:</label>
                <select class="form-control" name="specialization" id="specialization">
                    <option value="علوم اساسية">علوم اساسية</option>
                    <option value="برمجيات">برمجيات</option>
                    <option value="شبكات">شبكات</option>
                    <option value="ذكاء">ذكاء</option>
                </select>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="form-group">
                        <label for="max_practical">Max Practical Mark:</label>
                        <input type="number" class="form-control" id="max_practical"
                               placeholder="Enter Max Practical Mark"
                               name="max_practical" value="{{$subject->max_practical}}" required>
                    </div>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="form-group">
                        <label for="max_theoretical">Max Theoretical Mark:</label>
                        <input type="number" class="form-control" id="max_theoretical"
                               placeholder="Enter Max Theoretical Mark"
                               name="max_theoretical" value="{{$subject->max_theoretical}}" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


    </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection
