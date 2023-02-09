<div>
    <div class="container">
        <div class="row">
            {{-- <div class="map-wrap" style="width:100%; height: 445px;" id="map"></div> --}}
            <div class="col-lg-4 d-flex flex-column">
                {{-- <a class="contact-btns" href="#">Submit Your CV</a>
                <a class="contact-btns" href="#">Post New Job</a>
                <a class="contact-btns" href="#">Create New Account</a> --}}
                <img src="{{ asset('img/header-bg.jpg') }}" height="80%" alt="">
            </div>
            <div class="col-lg-7">
                <form wire:submit.prevent="SignIn()" class="form-area" class="contact-form text-right">
                    {{-- @csrf --}}
                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <label for=""> Email:</label>
                            <input wire:model="email" placeholder="Enter email address"
                                {{-- pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" --}}
                                class="common-input mb-20 form-control" required="" type="email">
                            {{-- @error('email')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror <br> --}}
                            <label for="password"> Password:</label>
                            <input wire:model="password" class="common-input mb-20 form-control" required=""
                                type="password">
{{--
                            @error('password')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror <br> --}}

                            {{-- <label for="Confirm_password"> Confirm_password:</label> --}}
                            {{-- <input name="Confirm_password"     onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your subject'" class="common-input mb-20 form-control" required="" type="password"> --}}
                            {{-- <textarea class="common-textarea mt-10 form-control" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea> --}}
                            <button type="submit" class="primary-btn mt-20 text-white"
                                style="float: right;">submit</button>
                            <div class="mt-20 alert-msg" style="text-align: left;"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
