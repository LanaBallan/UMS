@extends('Exams Dashboard.app')
@section('content')

    <div class="card shadow mb-4">

        <div style="text-align: right" class="card-header py-3">
            @foreach($request as $one)
            <h6 class="m-0 font-weight-bold text-primary">{{$one->type}}</h6>
        </div>
        <div style="text-align: right" class="card-body">

            <p>الاسم: {{$one->get_student->f_name}} {{$one->get_student->l_name}}</p>
            <p>الرقم الجامعي: {{$one->student_id}}</p>
            @foreach($one->get_student->get_uni_info as $tow)
                @if($tow->current_year=='1')
            <p>السنة الحالية: أولى</p>
                @elseif($tow->current_year=='2')
                <p>السنة الحالية: ثانية</p>
                @elseif($tow->current_year=='3')
                    <p>السنة الحالية: ثالثة</p>
                @elseif($tow->current_year=='4')
                    <p>السنة الحالية: رابعة</p>
                @else
                    <p>السنة الحالية: خامسة</p>
                @endif
                <p>سنوات الرسوب: {{$tow->total_failed_year}}</p>
                <p>الحالة: {{$tow->status}}</p>
                <p>سنة التسجبل: {{$tow->year}}</p>
                <p>الاختصاص: {{$tow->specialization}}</p>
            @endforeach
            <p>تاريخ الطلب: {{$one->created_at->toDateString()}}</p>
            <a type="button"
                              href="/exams/document-requests/confirm/{{$one->id}}"
                              class="btn btn-outline-success">تأكيد</a>
            @endforeach

        </div>
    </div>
@endsection
