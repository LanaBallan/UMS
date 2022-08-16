@extends('Exams Dashboard.app')
@section('content')

    <!-- Begin Page Content -->
    <div style="text-align: right" class="container-fluid">

        <!-- Page Heading -->
        <h1 class="text-center">قوائم الطلاب</h1>

        <form action="/exams/lists/export" method="GET">
            @csrf


            <div class="form-group">
                <label for="year">:السنة</label>
                <input style="text-align: right" type="number" class="form-control" id="year" placeholder="أدخل السنة" name="year" required>
            </div>
            <div class="form-group">
                <label for="specialization">:التخصص</label>
                <select style="text-align: right" class="form-control" name="specialization" id="specialization">
                    <option value="علوم اساسية">علوم اساسية</option>
                    <option value="برمجيات">برمجيات</option>
                    <option value="شبكات">شبكات</option>
                    <option value="ذكاء">ذكاء</option>
                </select>
            </div>

            <button style="text-align: right" type="submit" class="btn btn-primary">تصدير</button>
        </form>
    </div>

@endsection
