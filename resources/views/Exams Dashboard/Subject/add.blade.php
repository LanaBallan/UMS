@extends('Exams Dashboard.app')
@section('content')

            <!-- Begin Page Content -->
            <div style="text-align: right" class="container-fluid">

                <!-- Page Heading -->
                <h1 class="text-center">إضافة مادة</h1>

                <form action="/exams/subject/store" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">:الاسم</label>
                        <input style="text-align: right" type="text" class="form-control" id="name" placeholder="أدخل الاسم" name="name" required>
                    </div>
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
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <div class="form-group">
                                <label for="max_practical">:علامة العملي العظمى</label>
                                <input style="text-align: right" type="number" class="form-control" id="max_practical"  placeholder="أدخل علامة العملي العظمى"
                                       name="max_practical" required>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                        <div class="form-group">
                            <label for="max_theoretical">:علامة النظري العظمى</label>
                            <input style="text-align: right" type="number" class="form-control" id="max_theoretical"  placeholder="أدخل علامة النظري العظمى" name="max_theoretical" required>
                        </div>
                        </div>
                    </div>
                    <button style="text-align: right" type="submit" class="btn btn-primary">إضافة</button>
                </form>
                    </div>






@endsection
