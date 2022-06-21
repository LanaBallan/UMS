@extends('layouts.app')

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
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="POST" action="/student/store" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="f_name">First Name:</label>
                                        <input id="f_name" type="text" class="form-control form-control-user @error('f_name') is-invalid @enderror"
                                               name="f_name" value="{{ old('f_name') }}" required autocomplete="f_name" autofocus
                                               class="form-control form-control-user"
                                               placeholder="First Name">
                                        @error('f_name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="l_name">Last Name:</label>
                                        <input id="l_name" type="text" class="form-control form-control-user @error('l_name') is-invalid @enderror"
                                               name="l_name" value="{{ old('l_name') }}" required autocomplete="l_name"
                                               class="form-control form-control-user"
                                               placeholder="Last Name">
                                        @error('l_name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                                           id="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                                           placeholder="Email Address">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="phone">Phone:</label>
                                        <input id="phone" type="number" class="form-control form-control-user @error('phone') is-invalid @enderror"
                                               name="phone" value="{{ old('phone') }}" required autocomplete="phone"
                                               class="form-control form-control-user"
                                               placeholder="Phone Number">
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="photo">Personal Photo:</label>
                                        <input id="photo" type="file" class="form-control form-control-user "
                                               name="photo"  required
                                               placeholder="Personal Photo" accept="image/*,.pdf">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="Password">Password:</label>
                                        <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                               name="password" required autocomplete="new-password"
                                               placeholder="Password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="password-confirm">Repeat Password:</label>
                                        <input id="password-confirm" type="password" class="form-control form-control-user"
                                               name="password_confirmation" required autocomplete="new-password"
                                               placeholder="Repeat Password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    {{ __('Register Account') }}
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
