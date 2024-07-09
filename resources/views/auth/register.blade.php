<x-guestlayout>

    <nav class="navbar navbar-light navbar-expand-md py-3">
        <div class="container">
            <x-guestlogo/>
            <div class="collapse navbar-collapse" id="navcol-1">
                <x-homeabout/>
                <a href="{{ route('login') }}" wire:navigate><button class="btn btn-primary" type="button" style="background: #4e73df;border-style: none;">Log in</button></a>
            </div>
        </div>
    </nav>
    <div class="container">
        <div style="margin-top: 37px;">
            <h1 class="display-5 fw-normal text-center"><strong>Let's setup your account.</strong></h1>
        </div>
    </div>
    <div class="container py-4 py-lg-5">
        <div class="row d-flex justify-content-center" style="margin-bottom: -38px;">
            <div class="col-md-6 col-xl-4" style="width: 538px;">
                <div class="card mb-5">
                    <div class="card-body d-flex flex-column align-items-center" style="padding: 39px;padding-bottom: 27px;">
                        <form action="{{ route('register') }}" class="text-center" method="post">
                            @csrf

                            <input type="hidden" name="acctype" value="{{ $acctype }}">

                            <div class="mb-3">
                                <label class="form-label fw-semibold text-start d-flex" style="color: var(--bs-gray-600);margin-bottom: 2px;font-size: 15px;">First name</label>
                                <input class="form-control" type="text" name="fname" value="{{ old('fname') }}" style="width: 360.8px; @error('fname') border-color: rgb(205,68,59); @enderror">
                                @error('fname')
                                    <p class="text-start" style="margin-top: 0px; font-size: 12px;color: rgb(205,68,59);">{{ $message }}</p>
                                @enderror
                            </div>
                                  
                            <div class="mb-3">
                                <label class="form-label fw-semibold text-start d-flex" style="color: var(--bs-gray-600);margin-bottom: 2px;font-size: 15px;">Last name</label>
                                <input class="form-control" type="text" name="lname" value="{{ old('lname') }}" style="@error('lname') border-color: rgb(205,68,59); @enderror">
                                @error('lname')
                                    <p class="text-start" style="margin-top: 0px; font-size: 12px;color: rgb(205,68,59);">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold text-start d-flex" style="color: var(--bs-gray-600);margin-bottom: 2px;font-size: 15px;">Email address</label>
                                <input class="form-control" type="text" name="email" value="{{ old('email') }}" style="@error('email') border-color: rgb(205,68,59); @enderror">
                                @error('email')
                                    <p class="text-start" style="margin-top: 0px; font-size: 12px;color: rgb(205,68,59);">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold text-start d-flex" style="color: var(--bs-gray-600);margin-bottom: 2px;font-size: 15px;">Password</label>
                                <input class="form-control" type="password" name="password" style="@error('password') border-color: rgb(205,68,59); @enderror">
                                @error('password')
                                    <p class="text-start" style="margin-top: 0px; font-size: 12px;color: rgb(205,68,59);">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold text-start d-flex" style="color: var(--bs-gray-600);margin-bottom: 2px;font-size: 15px;">Confirm password</label>
                                <input class="form-control" type="password" name="password_confirmation" style="@error('password') border-color: rgb(205,68,59); @enderror">
                                @error('password')
                                    <p class="text-start" style="margin-top: 0px; font-size: 12px;color: rgb(205,68,59);">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <button class="btn btn-primary d-block w-100" type="submit" style="margin-top: 26px;background: #4e73df;border-style: none;margin-bottom: -13px;">Sign up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-guestlayout>