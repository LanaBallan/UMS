@extends('Affairs Dashboard.app')
@section('content')

    <!-- Begin Page Content -->
    <div style="text-align: right" class="container-fluid">

        <h1 class="text-center">فئات الطلاب</h1>

        <form action="/affairs/classes/export" method="GET">
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
            <div class="form-group">
                <label for="classes">:عدد الفئات</label>
                <input style="text-align: right" type="number" class="form-control" id="classes" placeholder="أدخل عدد الفئات" name="classes" required>
            </div>
            <div class="form-group">
                <label for="classification">:التوزيع</label>
                <select style="text-align: right" class="form-control" name="classification" id="classification">
                    <option value="name">حسب الاسم</option>
                    <option value="avg">حسب المعدل</option>

                </select>
            </div>
            <button type="submit" class="btn btn-primary">تأكيد</button>
        </form>
    </div>



    <!-- /.container-fluid -->


    <!-- End of Main Content -->
@endsection
