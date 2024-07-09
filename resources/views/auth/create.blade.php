<x-guestlayout>

    {{-- HEADER --}}
    <nav class="navbar navbar-light navbar-expand-md py-3">
        <div class="container">
            <x-guestlogo/>
            <div class="collapse navbar-collapse" id="navcol-1">
                <x-homeabout/>
                <a href="{{ route('login') }}" wire:navigate><button class="btn btn-primary" type="button" style="background: #4e73df;border-style: none;">Log in</button></a>
            </div>
        </div>
    </nav>

    {{-- ACCOUNT TYPES --}}
    <div class="container">
        <div style="margin-top: 37px;">
            <h1 class="display-5 fw-normal text-center"><strong>Let us know what you're looking for.</strong></h1>
        </div>
    </div>
    <div class="container d-flex py-4 py-xl-5">
        <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3 justify-content-center justify-content-sm-center justify-content-xl-center" style="margin-top: 0px;">
            <div class="col">
                <div class="card h-100">
                    <div class="card-body flex-column justify-content-between p-4">
                        <div>
                            <h6 class="text-uppercase fw-bold text-muted">CUSTOMER</h6>
                            <h4 class="display-6 fw-light">Looking for people who can work on a certain job?</h4>
                            <ul class="list-unstyled"></ul>
                        </div><a class="btn btn-primary d-block w-100" role="button" href="{{ route('register', ['acctype' => 'customer']) }}" style="background: #4e73df;border-style: none;" wire:navigate>Yes!</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column justify-content-between p-4">
                        <div>
                            <h6 class="text-uppercase fw-bold text-muted">HANDYMAN</h6>
                            <h4 class="display-6 fw-light">Looking for people who need your service?</h4>
                        </div><a class="btn btn-primary d-block w-100" role="button" href="{{ route('register', ['acctype' => 'handyman']) }}" style="background: #4e73df;border-style: none;" wire:navigate>Yes!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-guestlayout>