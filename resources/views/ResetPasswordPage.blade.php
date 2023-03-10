@extends('app.master')
@section('content')
    <section class="contact-page-area section-gap">
        <div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 d-flex flex-column">
                        <img src="{{ asset('img/header-bg.jpg') }}" alt="">
                    </div>
                    <div class="col-lg-7">
                        <form action="{{ route('updatePasswordPost') }}" method="POST" class="form-area"
                            class="contact-form text-right">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <input value="{{ $token }}" name="token" type="hidden" class="text">
                                <div class="col-lg-12 form-group">
                                    <label for="email"> Email </label>
                                    <input name="email" class="common-input mb-20 form-control"
                                        value="{{ old('email') }}" required="" type="email">
                                    @error('email')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror <br>
                                    <label for="password"> Password:</label>
                                    <input name="password" class="common-input mb-20 form-control" required=""
                                        type="password">
                                    @error('password')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror <br>
                                    <label for="password"> Confirm_Password:</label>
                                    <input name="password_confirmation" class="common-input mb-20 form-control"
                                        required="" type="password">

                                    <button type="submit" class="primary-btn mt-20 text-white"
                                        style="float: right;">Reset</button>
                                    <div class="mt-20 alert-msg" style="text-align: left;"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
@section('banner')
    <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Reset Password
                    </h1>
                    <p class="text-white"><a href="{{ route('home') }}">Home </a> <span class="lnr lnr-arrow-right"></span>
                        <a href="{{ route('login') }}"> Login</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('sweetAlert')
    @if (session()->has('success'))
        <script>
            swal("Success", "{!! Session::get('success') !!}", "success");
        </script>
    @elseif (session()->has('danger'))
        <script>
            swal("Error", "{!! Session::get('danger') !!}", "error");
        </script>
    @endif
@endpush
