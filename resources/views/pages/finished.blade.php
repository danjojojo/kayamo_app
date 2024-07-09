@auth
    <x-authlayout>
        
        <x-authcontent>
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="d-sm-flex justify-content-between align-items-center mb-4">
                            <h2 class="fw-bolder text-dark mb-0">Finished</h2>
                        </div>
                        @if (Auth::user()->acctype == 'customer')
                            {{-- CREATE REQUEST BUTTON --}}
                            
                            <div class="text-white bg-primary border rounded border-primary d-flex flex-column justify-content-between flex-lg-row p-4 p-md-5 mb-4" >
                                <div class="pb-2 pb-lg-1">
                                    <h3 class="fw-bold mb-2">Your finished bookings will appear here.</h3>
                                    <p class="mb-0">Review completed requests by handymen.</p>
                                </div>
                            </div>
                        @else
                            <div class="text-white bg-primary border rounded border-primary d-flex flex-column justify-content-between flex-lg-row p-4 p-md-5 mb-4" >
                                <div class="pb-2 pb-lg-1">
                                    <h3 class="fw-bold mb-2">Your finished bookings will appear here.</h3>
                                    <p class="mb-0">Open a completed booking to view the customer's review and rating.</p>
                                </div>
                            </div>
                        @endif
                        <div class="row gy-4 row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1" style="margin-bottom: 24px;">
                            @if (session('success'))
                                <div class="flex m-0">    
                                    <x-flashMsg msg="{{ session('success') }}"/>
                                </div>
                            @endif
                            @if (count($bookings) > 0)
                                @foreach ($bookings as $booking)
                                    @if (Auth::user()->id == $booking->user->id || Auth::user()->id == $booking->serviceRequest->user->id)
                                        <div class="col">
                                            <div class="card">
                                                <div class="card-body p-4">
                                                    <div class="d-flex">
                                                        @if ($booking->quote->user->image == null)
                                                            <img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png">
                                                        @else
                                                            <img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src=" {{ asset('storage/' . $booking->quote->user->image) }}">
                                                        @endif
                                                        <div class="d-inline-flex flex-fill justify-content-between">
                                                            <div>
                                                                <a style="text-decoration: none;" href="{{ route('profile', ['user' => $booking->quote->user]) }}" wire:navigate>
                                                                    <p class="fw-bold mb-0">{{ $booking->quote->user->fname.' '.$booking->quote->user->lname }}</p>
                                                                </a>
                                                                <p class="text-muted mb-0">{{ Str::ucfirst($booking->quote->user->acctype) }}</p>
                                                            </div>
                                                            <div>
                                                                <p class="fw-bold mb-0"><span style="font-weight: normal !important; color: rgb(78, 115, 223);">{{ $booking->created_at->diffForHumans() }}</span></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="text-center d-flex flex-fill justify-content-around" style="margin-bottom: 8px;margin-top: 22px;">
                                                            <div>
                                                                <h5 style="font-weight: bold;">Booked on</h5>
                                                                <h5>{{ $booking->created_at->toFormattedDateString() }}</h5>
                                                            </div>                                    
                                                            <div>
                                                                <h5 style="font-weight: bold;">Finished on</h5>
                                                                <h5>{{ $booking->created_at->toFormattedDateString() }}</h5>
                                                            </div>                                            
                                                            <div>
                                                                <h5 style="font-weight: bold;">Status</h5>
                                                                <h5>{{ $booking->status }}</h5>
                                                            </div>
                                                            <div>
                                                                <h5 style="font-weight: bold;">Amount</h5>
                                                                <h5>₱ {{ number_format($booking->quote->finalAmount, 2) }}</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="border rounded-0" style="margin-bottom: 16px;padding: 16px;">
                                                        <div class="d-flex">
                                                            @if ($booking->serviceRequest->user->image == null)
                                                                <img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png">
                                                            @else
                                                                <img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src=" {{ asset('storage/' . $booking->serviceRequest->user->image) }}">
                                                            @endif
                                                            <div class="d-inline-flex flex-fill justify-content-between">
                                                                <div>
                                                                    <a style="text-decoration: none;" href="{{ route('profile', ['user' => $booking->serviceRequest->user]) }}" wire:navigate>
                                                                        <p class="fw-bold mb-0">{{ $booking->serviceRequest->user->fname.' '.$booking->serviceRequest->user->lname}}</p>
                                                                    </a>
                                                                    <p class="text-muted mb-0">{{ Str::ucfirst($booking->serviceRequest->user->acctype) }}</p>
                                                                </div>
                                                                <div>
                                                                    {{-- <p class="fw-bold mb-0"><span style="font-weight: normal !important; color: rgb(78, 115, 223);">{{ $booking->serviceRequest->updated_at->diffForHumans() }}</span></p> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p style="margin-top: 8px;">{{ Str::words($booking->serviceRequest->description, 20) }}</p>
                                                        {{-- <a href="{{ route('requests.show', $booking->serviceRequest->id) }}" wire:navigate>
                                                            <div class="d-flex flex-row-reverse">
                                                                <button class="btn btn-primary float-end" type="button" style="background: rgb(78, 115, 223);">View</button>
                                                            </div>
                                                        </a> --}}
                                                    </div>
                                                    <a href="{{ route('finished.show', $booking->id) }}" wire:navigate>
                                                        <button class="btn btn-primary float-end" type="button" style="background: rgb(78, 115, 223);">View Details</button>
                                                    </a>
                                                    {{-- @if (Auth::user()->acctype == 'handyman')                                     
                                                        <button class="btn btn-primary float-end" type="button" style="background: rgb(78, 115, 223);">Service Completed</button>
                                                    @else
                                                        <button class="btn btn-outline-primary float-end" type="button" disabled>Service in progress</button>
                                                    @endif --}}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @else
                                <x-blank msg="There are no completed bookings at the moment."/> 
                            @endif
                        </div>
                        <div>
                            {{ $bookings->links() }}
                        </div>
                    </div>
                    <x-advertisement/>
                </div>
            </div>
        </x-authcontent>

    </x-authlayout>
@endauth