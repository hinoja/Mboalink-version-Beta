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
                <form wire:submit.prevent="signUp" class="form-area" class="contact-form text-right">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <label for="name">Name:</label>
                            <input wire:model.defer="name" name="name" placeholder="Enter your name"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'"
                                class="common-input mb-20 form-control" required="" type="text">
                            @error('name')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                            <label for=""> Email:</label>
                            <input name="email" wire:model.defer="email" placeholder="Enter email address"
                                pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'"
                                class="common-input mb-20 form-control" required="" type="email">
                            @error('email')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                            <label for="birthDay"> BirthDay:</label>
                            <input name="birthDay" wire:model.defer="birthDay"
                                pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter birthDay'"
                                class="common-input mb-20 form-control" required="" type="date">
                            @error('birthday')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                            <label for="town"><i class="fa fa-globe" aria-hidden="true"></i> Town: </label>
                            <input name="text" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'"
                                class="common-input mb-20 form-control" required="" type="password">
                            <select name="towns" wire:model.defer="townField"
                                pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter town address'"
                                class="common-input mb-20 form-control" required="">
                                @foreach ($towns as $town)
                                    <option value="{{ $town->id }}">{{ $town->name }}</option>
                                @endforeach
                            </select>
                            @error('townField')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                            <label for="password"> Password:</label>
                            <input name="password" wire:model.defer="password" class="common-input mb-20 form-control"
                                required="" type="password">
                            @error('password')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror <br>
                        </div>
                        <div class="mt-20 alert-msg" style="text-align: left;"></div>
                        <button type="submit" class="primary-btn mt-20 text-white"
                            style="float: right;">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>
