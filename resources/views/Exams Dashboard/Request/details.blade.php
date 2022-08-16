@extends('Exams Dashboard.app')
@section('content')

    <div class="card shadow mb-4">

        <div style="text-align: right" class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">{{$request->type}}</h6>
        </div>
        <div style="text-align: right" class="card-body">

            <p>الاسم: {{$request->f_name}} {{$request->l_name}}</p>
            <p>الرقم الجامعي: {{$request->studentId}}</p>
            @if($request->current_year=='1')
                <p>السنة الحالية: أولى</p>
            @elseif($request->current_year=='2')
                <p>السنة الحالية: ثانية</p>
            @elseif($request->current_year=='3')
                <p>السنة الحالية: ثالثة</p>
            @elseif($request->current_year=='4')
                <p>السنة الحالية: رابعة</p>
            @else
                <p>السنة الحالية: خامسة</p>
            @endif
            <p>سنوات الرسوب: {{$request->total_failed_year}}</p>
            <p>الحالة: {{$request->status}}</p>
            <p>الاختصاص: {{$request->specialization}}</p>
            <p>تاريخ الطلب: {{$request->date}}</p>
            @if($request->type=='كشف علامات')
                <p> <a data-toggle="modal"
                       data-target="#Modal1">تبرع بالدم</a></p>
                <p> <a data-toggle="modal"
                       data-target="#Modal2">صورة الهوية</a></p>
                <p> <a data-toggle="modal"
                       data-target="#Modal3">ايصال مالي</a></p>
        @else

        @endif
        <!-- Modal1 -->
            <div class="modal fade"
                 id="Modal1"
                 tabindex="-1"
                 role="dialog"
                 aria-labelledby="ModalLabel1"
                 aria-hidden="true">

                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <!-- Add image inside the body of modal -->
                        <div class="modal-body">
                            <img id="image" src=
                            "https://media.geeksforgeeks.org/wp-content/uploads/20210915115837/gfg3.png"
                                 alt="Click on button" />
                        </div>

                        <div class="modal-footer">
                            <button type="button"
                                    class="btn btn-secondary"
                                    data-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal2 -->
            <div class="modal fade"
                 id="Modal2"
                 tabindex="-1"
                 role="dialog"
                 aria-labelledby="ModalLabel2"
                 aria-hidden="true">

                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <!-- Add image inside the body of modal -->
                        <div class="modal-body">
                            <img id="image" src=
                            "https://media.geeksforgeeks.org/wp-content/uploads/20210915115837/gfg3.png"
                                 alt="Click on button" />
                        </div>

                        <div class="modal-footer">
                            <button type="button"
                                    class="btn btn-secondary"
                                    data-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal3 -->
            <div class="modal fade"
                 id="Modal3"
                 tabindex="-1"
                 role="dialog"
                 aria-labelledby="ModalLabel3"
                 aria-hidden="true">

                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <!-- Add image inside the body of modal -->
                        <div class="modal-body">
                            <img id="image" src=
                            "https://media.geeksforgeeks.org/wp-content/uploads/20210915115837/gfg3.png"
                                 alt="Click on button" />
                        </div>

                        <div class="modal-footer">
                            <button type="button"
                                    class="btn btn-secondary"
                                    data-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Adding scripts to use bootstrap -->
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                    integrity=
                    "sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
                    crossorigin="anonymous">
            </script>
            <script src=
                    "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
                    integrity=
                    "sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                    crossorigin="anonymous">
            </script>
            <script src=
                    "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
                    integrity=
                    "sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                    crossorigin="anonymous">
            </script>
            <a type="button"
               href="/exams/document-requests/reject/{{$request->requestId}}"
               class="btn btn-outline-danger">رفض</a>
            <a type="button"
               href="/exams/document-requests/confirm/{{$request->requestId}}"
               class="btn btn-outline-success">تأكيد</a>

        </div>
    </div>
@endsection
