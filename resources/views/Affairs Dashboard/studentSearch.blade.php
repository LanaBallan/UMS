@extends('Affairs Dashboard.app')
@section('content')
    <div class="container">

        <div class="row">

            <div class="col-md-12">
                <br><br>
                <div style="text-align: right" class="row">
                    <div class="text col-md-12">

                        <h4> الاسم: {{$student->f_name}} {{$student->l_name}} </h4>
                    </div>


                </div>
                <div style="text-align: right" class="row">
                    <div class="text col-md-12">
                        @if($student->current_year==1)

                            <h4> السنة: الأولى</h4>
                        @elseif($student->current_year==2)

                            <h4> السنة: الثانية</h4>
                        @elseif($student->current_year==3)

                            <h4> السنة: الثالثة</h4>
                        @elseif($student->current_year==4)

                            <h4> السنة: الرابعة</h4>
                        @elseif($student->current_year==5)

                            <h4> السنة: الخامسة</h4>
                        @endif
                    </div>


                </div>
                <div style="text-align: right" class="row">
                    <div class="text col-md-12">

                        <h4> الاختصاص: {{$student->specialization}}</h4>
                    </div>


                </div>
                <div style="text-align: right" class="row">
                    <div class="text col-md-12">

                        <h4> الحالة: {{$student->status}}</h4>
                    </div>


                </div>
                <div style="text-align: right" class="row">
                    <div class="text col-md-12">

                        <h4> عدد سنوات الرسوب: {{$student->total_failed_year}}</h4>
                    </div>


                </div>
                <div style="text-align: right" class="row">
                    <div class="text col-md-12">

                        <h4> عدد مواد الرسوب: {{$marks}}</h4>
                    </div>


                </div>
                <div style="text-align: right" class="row">
                    <div class="text col-md-12">

                        <a href="/affairs/student/marks/{{$student->id}}">تفاصيل العلامات</a>
                    </div>


                </div>
            </div>

        </div>
    </div>
@endsection
