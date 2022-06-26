@extends('Exams Dashboard.app')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Mark</h1>

        </div>

        <form action="/exams/mark/store" method="POST">
            @csrf

            <div class="form-group">
                <label for="student_id">Student ID:</label>
                <input type="number" class="form-control" id="student_id" placeholder="Enter Student ID" name="student_id" required>
            </div>
            <div class="form-group">
                <label for="subject_id">Subject:</label>
                <select class="form-control" name="subject_id" id="subject_id">
                    @foreach($subjects as $one)
                    <option value="{{$one->id}}">{{$one->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="form-group">
                        <label for="practical_mark">Practical Mark:</label>
                        <input type="number" class="form-control" id="practical_mark" placeholder="Enter Practical Mark" name="practical_mark" required>
                    </div>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="form-group">
                        <label for="theoretical_mark">Theoretical Mark:</label>
                        <input type="number" class="form-control" id="theoretical_mark" placeholder="Enter Theoretical Mark" name="theoretical_mark" required>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="form-group">
                        <label for="year">Year:</label>
                        <input type="number" class="form-control" id="year" placeholder="Enter Year" name="year" required>
                    </div>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="form-group">
                        <label for="semester">Semester:</label>
                        <select class="form-control" name="semester" id="semester">

                            <option value="1">First Semester</option>
                            <option value="2">Second Semester</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>



    <!-- /.container-fluid -->


    <!-- End of Main Content -->
@endsection
