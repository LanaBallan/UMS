@extends('Affairs Dashboard.app')
@section('content')

    <!-- Begin Page Content -->
    <div style="text-align: right" class="container-fluid">

        <h1 class="text-center">إضافة إعلان</h1>

        <form action="/affairs/ad/store" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group shadow-textarea">
                <label for="description">:نص الإعلان</label>
                <textarea style="text-align: right" class="form-control z-depth-1" id="description"
                          name="description" rows="3" placeholder="أدخل نص الإعلان هنا"></textarea>
            </div>


            <div class="form-group row">
                <div class="col-sm-6">

                    <label for="date">:تاريخ الإعلان</label>
                    <input style="text-align: right" type="date" id="date" name="date" class="form-control form-control-user ">
                </div>
                <div class="col-sm-6">
                    <label for="img">:صورة عن الإعلان</label>
                    <input style="text-align: right" id="img" type="file" class="form-control form-control-user "
                           name="img"
                           placeholder="صورة الإعلان" accept="image/*,.pdf">
                </div>
            </div>




            <button type="submit" class="btn btn-primary">إضافة</button>
        </form>
    </div>



    <!-- /.container-fluid -->


    <!-- End of Main Content -->
@endsection
