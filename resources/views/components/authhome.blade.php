<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="d-sm-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bolder text-dark mb-0">Welcome to KayaMo!</h2>
            </div>
            {{-- CREATE REQUEST BUTTON --}}
            @if (Auth::user()->contactnum == 'No information provided.')
                <a href="{{ route('profile', Auth::user()->id)}}" style="text-decoration: none;" wire:navigate>
                    <div class="row gy-4 row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1" style="margin-bottom: 24px;">
                        <div class="col">
                            <div class="card bg-primary">
                                <div class="card-body p-4">
                                    <div class="bs-icon-md bs-icon-rounded bs-icon-primary text-light d-flex justify-content-center align-items-center d-inline-block mb-3 bs-icon" style="background: var(--bs-card-bg);"><i class="fas fa-user-cog text-primary"></i></div>
                                    <h4 class="text-light card-title">Let's finish setting up your account.</h4>
                                    <p class="text-light card-text">Click here to get started.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endif
            <div class="row gy-4 row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-2" style="margin-bottom: 24px;">
                <a href="{{ route('requests.index') }}" style="text-decoration: none; color: #858796;" wire:navigate>
                    <div class="col">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center d-inline-block mb-3 bs-icon"><i class="fas fa-clipboard-list"></i></div>
                                <h4 class="card-title">Requests</h4>
                                @if (Auth::user()->acctype == 'customer')
                                    <p class="card-text">Need someone's service? Create or view service requests here. Click here to make one.</p>
                                @else
                                    <p class="card-text">Looking for tasks? Browse and respond to customer service requests here.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{ route('quotes.index') }}" style="text-decoration: none; color: #858796;" wire:navigate>
                <div class="col">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center d-inline-block mb-3 bs-icon"><i class="fas fa-dollar-sign"></i></div>
                            <h4 class="card-title">Quotes</h4>
                            @if (Auth::user()->acctype == 'customer')
                                <p class="card-text">Know initial cost of your request. Click here to view and manage handyman quotes.</p>
                            @else
                                <p class="card-text">Manage your initial and final quotes to customer service requests. Click here.</p>
                            @endif
                        </div>
                    </div>
                </div>
                </a>
                <a href="{{ route('bookings.index') }}" style="text-decoration: none; color: #858796;" wire:navigate>
                <div class="col">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center d-inline-block mb-3 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bookmark-fill">
                                    <path d="M2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2z"></path>
                                </svg></div>
                            <h4 class="card-title">Bookings</h4>
                            @if (Auth::user()->acctype == 'customer')
                                <p class="card-text">View, track, and update bookings here.&nbsp;Click here to see your ongoing bookings.</p>
                            @else
                                <p class="card-text">Track and manage your current jobs. Click here to view and update your bookings.</p>
                            @endif
                            
                        </div>
                    </div>
                </div>
                </a>
                <a href="{{ route('finished') }}" style="text-decoration: none; color: #858796;" wire:navigate>
                <div class="col">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center d-inline-block mb-3 bs-icon"><i class="fas fa-check"></i></div>
                            <h4 class="card-title">Finished</h4>
                            @if (Auth::user()->acctype == 'customer')
                                <p class="card-text">Keep track of completed work. Click here to view your finished requests and feedback.</p>
                            @else
                                <p class="card-text">Review your completed work and customer ratings. Click here to proceed.</p>
                            @endif
                        </div>
                    </div>
                </div>
                </a>
            </div>
        </div>
        <x-advertisement/>
    </div>
</div>