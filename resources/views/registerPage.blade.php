@extends('app.master')
@section('content')
    <section class="contact-page-area section-gap">
        <div>
            <div class="container">
                <div class="row">
                    {{-- <div class="map-wrap" style="width:100%; height: 445px;" id="map"></div> --}}
                    <div class="col-lg-4 d-flex flex-column">
                        {{-- <a class="contact-btns" href="#">Submit Your CV</a>
                        <a class="contact-btns" href="#">Post New Job</a>
                        <a class="contact-btns" href="#">Create New Account</a> --}}
                        <img src="{{ asset('img/pages/f2.jpg') }}" height="80%" alt="">
                    </div>
                    <div class="col-lg-7">
                        <form action="{{ route('registerPost') }}" method="POSt" class="form-area"
                            class="contact-form text-right">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 form-group">
                                    <label for="name">Name:</label>
                                    <input name="name" value="{{ old('name') }}" placeholder="Enter your name"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'"
                                        class="common-input mb-20 form-control" required="" type="text">
                                    @error('name')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror <br>
                                    <label for=""> Email:</label>
                                    <input name="email" value="{{ old('email') }}" placeholder="Enter email address"
                                        pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'"
                                        class="common-input mb-20 form-control" required="" type="email">
                                    @error('email')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror <br>
                                    <label for="birthDay"> BirthDay:</label>
                                    <input name="birthDay" value="{{ old('birthDay') }}"
                                        pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter birthDay'"
                                        class="common-input mb-20 form-control" required="" type="date">
                                    @error('birthday')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror <br>
                                    <label for="town"><i class="fa fa-globe" aria-hidden="true"></i> Town: </label>
                                    <select name="townField" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter town address'"
                                        class="common-input mb-20 form-control" required="">
                                        @foreach ($towns as $town)
                                            <option value="{{ $town->id }}">{{ $town->name }}</option>
                                        @endforeach
                                    </select> <br>
                                    @error('townField')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror <br>
                                    <label for="password"> Password:</label>
                                    <input name="password" class="common-input mb-20 form-control" required=""
                                        type="password">
                                    @error('password')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror <br>

                                    {{-- <label for="Confirm_password"> Confirm_password:</label> --}}
                                    {{-- <input name="Confirm_password"     onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your subject'" class="common-input mb-20 form-control" required="" type="password"> --}}
                                    {{-- <textarea class="common-textarea mt-10 form-control" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea> --}}
                                </div>
                            </div>
                            <div class="mt-20 alert-msg" style="text-align: left;"></div>
                            <button type="submit" class="primary-btn mt-20 text-white"
                                style="float: right;">Register</button>
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
                        Register
                    </h1>
                    <p class="text-white"><a href="{{ route('home') }}">Home </a> <span class="lnr lnr-arrow-right"></span>
                        <a href="{{ route('register') }}"> Register</a>
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
