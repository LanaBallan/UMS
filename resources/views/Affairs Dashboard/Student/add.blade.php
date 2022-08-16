@extends('Affairs Dashboard.app')

@section('content')


    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">إنشاء حساب طالب</h1>
                            </div>
                            <form class="user" method="POST" action="/affairs/student/store" enctype="multipart/form-data">
                                @csrf
                                <div style="text-align: right" class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="l_name">:اسم العائلة</label>
                                        <input style="text-align: right" id="l_name" type="text" class="form-control form-control-user @error('l_name') is-invalid @enderror"
                                               name="l_name" value="{{ old('l_name') }}" required autocomplete="l_name" autofocus
                                               class="form-control form-control-user"
                                               placeholder="أدخل اسم العائلة">
                                        @error('l_name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="f_name">:الاسم</label>
                                        <input style="text-align: right" id="f_name" type="text" class="form-control form-control-user @error('f_name') is-invalid @enderror"
                                               name="f_name" value="{{ old('f_name') }}" required autocomplete="f_name"
                                               class="form-control form-control-user"
                                               placeholder="أدخل الاسم">
                                        @error('f_name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div style="text-align: right" class="form-group">
                                    <label for="email">:البريد الالكتروني</label>
                                    <input style="text-align: right" type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                                           id="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                                           placeholder="أدخل البريد الالكتروني الخاص بالطالب">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div style="text-align: right" class="form-group row">

                                    <div class="col-sm-6">
                                        <label for="photo">:الصورة الشخصية</label>
                                        <input style="text-align: right" id="photo" type="file" class="form-control form-control-user "
                                               name="photo"  required
                                               placeholder="صورة الطالب الشخصية" accept="image/*,.pdf">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="phone">:رقم الهاتف</label>
                                        <input style="text-align: right" id="phone" type="number" class="form-control form-control-user @error('phone') is-invalid @enderror"
                                               name="phone" value="{{ old('phone') }}" required autocomplete="phone"
                                               class="form-control form-control-user"
                                               placeholder="أدخل رقم هاتف الطالب">
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div style="text-align: right" class="form-group row">

                                    <div class="col-sm-6">
                                        <label for="password-confirm">:أعد كلمة المرور</label>
                                        <input style="text-align: right" id="password-confirm" type="password" class="form-control form-control-user"
                                               name="password_confirmation" required autocomplete="new-password"
                                               placeholder="أعد إدخال كلمة المرور">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="Password">:كلمة المرور</label>
                                        <input style="text-align: right" id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                               name="password" required autocomplete="new-password"
                                               placeholder="أدخل كلمة المرور">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                   إنشاء الحساب
                                </button>

                                <hr>

                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
