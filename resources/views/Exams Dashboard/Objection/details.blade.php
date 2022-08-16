@extends('Exams Dashboard.app')
@section('content')
    <div style="text-align: right" class="container-fluid">
        <table class="table">

            <thead>
            <tr>
                <th>العلامة الكاملة</th>
                <th>علامة النظري</th>
                <th>علامة العملي</th>
                <th>اسم المادة</th>
            </tr>
            </thead>
           <tbody>
                <tr>

                    <td>{{$mark->total_mark}}</td>
                    <td>{{$mark->theoretical_mark}}</td>
                    <td>{{$mark->practical_mark}}</td>
                    <td>{{$mark->name}}</td>
                </tr>
            </tbody>
        </table>
        <form action="/exams/mark/update/{{$objection->id}}" method="Post" enctype="multipart/form-data">
            @csrf
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="form-group">
                    <label for="edit_img">:صورة قرار التعديل</label>
                    <input style="text-align: right" id="edit_img" type="file" class="form-control form-control-user "
                           name="edit_img"  required
                           accept="image/*,.pdf">
                </div>
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="form-group">
                    <label for="mark">:العلامة الجديدة</label>
                    <input style="text-align: right" type="number" class="form-control" id="mark" placeholder="أدخل العلامة" name="mark" required>
                </div>
            </div>

    </div>
                <a type="button"
                   href="/exams/obj/delete/{{$objection->id}}"
                   class="btn btn-outline-danger">الغاء</a>
                <button type="submit" class="btn btn-primary">تعديل</button>

        </form>
    </div>
@endsection
