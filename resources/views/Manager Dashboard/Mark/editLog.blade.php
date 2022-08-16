@extends('Manager Dashboard.app')
@section('content')
    <style>
        #myImg {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        #myImg:hover {opacity: 0.7;}

        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
        }

        /* Modal Content (Image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

        /* Caption of Modal Image (Image Text) - Same Width as the Image */
        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }

        /* Add Animation - Zoom in the Modal */
        .modal-content, #caption {
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @keyframes zoom {
            from {transform:scale(0)}
            to {transform:scale(1)}
        }

        /* The Close Button */
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px){
            .modal-content {
                width: 100%;
            }
        }
    </style>
    <div style="text-align: right" class="container-fluid">
        <h1 class="text-center">سجل التعديلات</h1>

            <table style="text-align: center" class="table table-bordered">
                <thead>
                <tr>
                    <th>صورة قرار التعديل</th>

                    <th>العلامة الكاملة</th>
                    <th>علامة النظري</th>
                    <th>علامة العملي</th>
                    <th>اسم المادة</th>
                    <th>الرقم الجامعي</th>
                    <th>اسم الطالب</th>
                    <th>تاريخ التعديل</th>
                    <th>اسم الموظف</th>
                </tr>
                </thead>
                <tbody>
                @foreach($edits1 as $one)
                    <tr>
                      <td><img id="myImg {{$one->id}}" src="{{asset('upload/'.$one->edit_pic)}}"  style="width: 100px; height: 100px"></td>
                        <td>{{$one->total_mark}}</td>
                        <td>{{$one->theoretical_mark}}</td>
                        <td>{{$one->practical_mark}}</td>
                        <td>{{$one->subjectName}}</td>
                        <td>{{$one->studentId}}</td>
                        <td>{{$one->studentFname}} {{$one->studentLname}}</td>
                        <td>{{$one->date}}</td>
                        <td>{{$one->f_name}} {{$one->l_name}}</td>

                        @endforeach
                @foreach($edits2 as $one)
                    <tr>
                        <td><img id="myImg {{$one->id}}" src="{{asset('upload/'.$one->edit_pic)}}"  style="width: 100px; height: 100px"></td>
                        <td>{{$one->total_mark}}</td>
                        <td>{{$one->theoretical_mark}}</td>
                        <td>{{$one->practical_mark}}</td>
                        <td>{{$one->subjectName}}</td>
                        <td>{{$one->studentId}}</td>
                        <td>{{$one->studentFname}} {{$one->studentLname}}</td>
                        <td>{{$one->date}}</td>
                        <td>{{$one->f_name}} {{$one->l_name}}</td>


                        @endforeach
                    </tr>
                </tbody>
            </table>
    </div>
@endsection
