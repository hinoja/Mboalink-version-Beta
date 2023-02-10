@extends('app.master')
@section('content')
    <section class="contact-page-area section-gap" >
        <div class="container">
            <form action="{{ route('post.add') }}" method="POST">
                @csrf
                @method('post')
                <div class="row">
                    <div class="offset-md-2 col-md-7">
                        <div class="card card-statistics">
                            <div class="card-header">
                                <div class="card-heading">
                                    <h4 class="card-title">Title Post</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <input name="title" class="common-input mb-20 form-control" required type="text">
                                @error('title')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror <br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-12">
                        <div class="card card-statistics">
                            <div class="card-header">
                                <div class="card-heading">
                                    <h4 class="card-title">Create Post </h4>
                                </div>
                            </div>

                            <textarea name="body" required id="summernote" class="card-body summernote" cols="30" rows="10"></textarea>
                            @error('body')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror <br>
                        </div>
                        <br>
                        <br>
                        <button type="submit" style="background-color: rgb(198, 160, 198);"
                            class="primary-btn mt-20 text-white" style="float: right;">Send</button>
                    </div>
                </div>
            </form>

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
                        Post
                    </h1>
                    <p class="text-white"><a href="{{ route('home') }}">Home </a> <span class="lnr lnr-arrow-right"></span>
                        <a href="{{ route('post.view') }}"> Post</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('sweetAlert')
    @if (session()->has('success'))
        <script>
            swal("Success", "{!! Session::get('success') !!}", "success", {
                button: "ok"
            });
        </script>
    @elseif (session()->has('danger'))
        <script>
            swal("Error", "{!! Session::get('error') !!}", "error", {
                button: "ok"
            });
        </script>
    @endif
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors.css') }}" />
    <!-- app style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />
    <script src="{{ asset('assets/js/vendors.js') }}"></script>
    <!-- custom app -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
@endpush
