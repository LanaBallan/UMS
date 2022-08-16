@extends('Exams Dashboard.app')
@section('content')
    <div style="text-align: right" class="container-fluid">
        <form action="/exams/re-prac/status/update" method="Post">
            @if(Session::get('Success'))
                <div class="alert alert-success">{{Session::get('Success')}}</div>
            @endif
            @csrf
<div class="form-group">
    <label for="manage">إمكانية التسجيل</label>
    <select style="text-align: right" class="form-control" name="manage" id="manage">
            <option value="1">فتح باب التسجيل</option>
        <option value="0">إغلاق باب التسجيل</option>
    </select>
</div>
            <button type="submit" class="btn btn-primary">تأكيد</button>
        </form>
    </div>
@endsection
