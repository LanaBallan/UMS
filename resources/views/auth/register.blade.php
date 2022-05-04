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
                            <form class="user" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user @error('email') is-invalid @enderror"
                                               id="fname" name="fname" value="{{ old('fname') }}" required autocomplete="fname"
                                               placeholder="First Name">
                                        @error('fname')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input id="lname" type="text" class="form-control form-control-user @error('lname') is-invalid @enderror"
                                               name="lname" value="{{ old('lname') }}" required autocomplete="lname"
                                               class="form-control form-control-user"
                                               placeholder="Last Name">
                                        @error('lname')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
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
                                        <input id="password-confirm" type="password" class="form-control form-control-user"
                                               name="password_confirmation" required autocomplete="new-password"
                                               placeholder="Repeat Password">
                                    </div>
                                </div>
<br> <h3>Choose Role</h3>


                                <div class="form-check">

                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="role" id="role" value="manager">Manager
                                    </label>
                                </div>
                                <br>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="role" id="role" value="exam">Exam Department
                                    </label>
                                </div>
                                <br>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="role" id="role" value="affairs" >Affairs Department
                                    </label>
                                </div>

                                <br><br>
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
