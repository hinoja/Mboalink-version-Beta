@extends('app.master')
@section('content')
    <section class="contact-page-area section-gap">
        <div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 d-flex flex-column">
                        <img src="{{ asset('img/header-bg.jpg') }}" height="200px" alt="">
                    </div>
                    <div class="col-lg-7">
                        <form action="{{ route('loginPost') }}" method="POST" class="form-area"
                            class="contact-form text-right">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 form-group">
                                    <label for=""> Email:</label>
                                    <input name="email" value="{{ old('email') }}" placeholder="Enter email address"
                                        class="common-input mb-20 form-control" required="" type="email">
                                    @error('email')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror <br>
                                    <label for="password"> Password:</label>
                                    <input name="password" class="common-input mb-20 form-control" required=""
                                        type="password">
                                    @error('password')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror <br>
                                    <button type="submit" class="primary-btn mt-20 text-white"
                                        style="float: right;">submit</button>
                                    <div class="mt-20 alert-msg" style="text-align: left;"></div>
                                </div>
                            </div>
                        </form>

                        <a href="{{ route('register') }}">I don't have account</a> <br><br>
                        <a style="color: purple;" href="{{ route('get.email') }}">Forget password</a>
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
                        Login
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
