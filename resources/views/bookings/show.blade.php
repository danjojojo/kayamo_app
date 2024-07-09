@auth
    <x-authlayout>
        
        <x-authcontent>
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <button id="goBackButton" style="border-style: none;background: #00000000;color: #4e73df;">&larr; Go back</button>
                        <div class="d-sm-flex justify-content-between align-items-center mb-4">
                            <h2 class="fw-bolder text-dark mb-0">Booking Details</h2>
                        </div>
                        <div class="row gy-4 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-2 d-xl-flex justify-content-xl-center align-items-xl-center" style="margin-bottom: 24px;">
                            <div class="col-auto col-md-8 col-lg-6 col-xl-5 col-xxl-4" style="width: 871.094px;">
                                <div class="card mb-5">
                                    <div class="card-body p-sm-5">
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
                                                    <p class="fw mb-0">{{ Str::ucfirst($booking->quote->user->acctype) }}</p>
                                                </div>
                                                <div>
                                                    <p class="fw-bold mb-0"><span style="font-weight: normal !important; color: rgb(78, 115, 223);">{{ $booking->created_at->diffForHumans() }}</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr style="margin-top: 22px;">
                                        <div class="text-center d-flex flex-fill justify-content-around" style="margin-bottom: 8px;margin-top: 22px;">
                                            <div>
                                                <h5 style="font-weight: bold;">Booked on</h5>
                                                <h5>{{ $booking->created_at->toFormattedDateString() }}</h5>
                                            </div>
                                            @if ($booking->status == 'Completed')
                                                <div>
                                                    <h5 style="font-weight: bold;">Finished on</h5>
                                                    <h5>{{ $booking->created_at->toFormattedDateString() }}</h5>
                                                </div>
                                            @endif
                                            <div>
                                                <h5 style="font-weight: bold;">Status</h5>
                                                <h5>{{ $booking->status }}</h5>
                                            </div>
                                            <div>
                                                <h5 style="font-weight: bold;">Amount</h5>
                                                <h5>₱ {{ number_format($booking->quote->finalAmount, 2) }}</h5>
                                            </div>
                                        </div>
                                        <div class="mb-3" style="margin-top: 22px;">
                                            <p style="margin-top: 8px;border-radius: 0px;padding: 0px;border: 1px none rgb(214,214,214);"><strong>Booked by</strong></p>
                                            <a style="text-decoration: none;" href="{{ route('profile', ['user' => $booking->serviceRequest->user]) }}" wire:navigate>
                                                <p style="margin-top: 8px;border-radius: 5px;padding: 9px;border: 1px solid rgb(214,214,214); font-weight: bold;">
                                                    {{ $booking->serviceRequest->user->fname }} {{ $booking->serviceRequest->user->lname }}
                                                </p>
                                            </a>
                                        </div>
                                        <div class="mb-3" style="margin-top: 22px;">
                                            <p style="margin-top: 8px;border-radius: 0px;padding: 0px;border: 1px none rgb(214,214,214);"><strong>Service type</strong></p>
                                            <p style="margin-top: 8px;border-radius: 5px;padding: 9px;border: 1px solid rgb(214,214,214);">{{ $booking->serviceRequest->type }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <p style="margin-top: 8px;border-radius: 0px;padding: 0px;border: 1px none rgb(214,214,214);"><strong>Service description</strong></p>
                                            <p style="margin-top: 8px;border-radius: 5px;padding: 9px;border: 1px solid rgb(214,214,214);">{{ $booking->serviceRequest->description }}</p>
                                        </div>
                                        <div class="mb-3"><label class="form-label"><strong>Location description</strong></label>
                                            <p style="margin-top: 8px;border-radius: 5px;padding: 9px;border: 1px solid rgb(214,214,214);">{{ $booking->serviceRequest->location }}</p>
                                        </div>
                                        <hr style="margin-top: 22px;">
                                        <div class="m-0 text-muted" style="font-size: 14px; padding: 5px 0px 15px">
                                            <p style="margin-top: 8px;border-radius: 0px;padding: 0px;border: 1px none rgb(214,214,214);"><strong>Service Completion Guidelines</strong></p>
                                            @if (Auth::user()->acctype == 'customer')
                                                <ul>
                                                    <li><p>Before confirming, inspect the completed work thoroughly to ensure it meets your expectations.</p></li>
                                                    <li><p>Address any issues or adjustments needed with the handyman promptly and clearly.</p></li>
                                                    <li><p>Once satisfied, mark the service as completed to finalize the transaction.</p></li>
                                                </ul>
                                            @else
                                                <ul>
                                                    <li><p>Seek confirmation from the customer that they are satisfied with the work.</p></li>
                                                    <li><p>Address any concerns or adjustments the customer requests promptly and professionally.</p></li>
                                                    <li><p>Mark the service as completed once the customer agrees.</p></li>
                                                </ul>
                                            @endif
                                        </div>

                                        @if (Auth::user()->acctype == 'customer')
                                            @if ($booking->confirmCustomer == 0  && $booking->confirmHandyman == 0)
                                                <form action="{{ route('bookings.update', $booking) }}" method="post" style="margin-top: 0px;">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="confirmCustomer" value="1">
                                                    <div class="d-flex flex-fill justify-content-between">
                                                        <button class="btn btn-primary d-block w-100" type="submit" style="font-family: 'Libre Franklin', sans-serif;">Service Completed</button>
                                                    </div>
                                                </form>
                                            @elseif ($booking->confirmCustomer == 0 && $booking->confirmHandyman == 1)
                                                <form action="{{ route('bookings.update', $booking) }}" method="post" style="margin-top: 0px;">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="confirmCustomer" value="1">
                                                    <div class="d-flex flex-fill justify-content-between">
                                                        <button class="btn btn-primary d-block w-100" type="submit" style="font-family: 'Libre Franklin', sans-serif;">Confirm Service Completed</button>
                                                    </div>
                                                </form>
                                            @else
                                                <button class="btn btn-primary d-block w-100" type="button" disabled>Waiting for handyman's confirmation</button>
                                            @endif
                                            
                                        @else
                                            @if ($booking->confirmCustomer == 0 && $booking->confirmHandyman == 0)
                                                <form action="{{ route('bookings.update', $booking) }}" method="post" style="margin-top: 0px;">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="confirmHandyman" value="1">
                                                    <div class="d-flex flex-fill justify-content-between">
                                                        <button class="btn btn-primary d-block w-100" type="submit" style="font-family: 'Libre Franklin', sans-serif;">Service Completed</button>
                                                    </div>
                                                </form>
                                            @elseif ($booking->confirmHandyman == 0 && $booking->confirmCustomer == 1)
                                                <form action="{{ route('bookings.update', $booking) }}" method="post" style="margin-top: 0px;">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="confirmHandyman" value="1">
                                                    <div class="d-flex flex-fill justify-content-between">
                                                        <button class="btn btn-primary d-block w-100" type="submit" style="font-family: 'Libre Franklin', sans-serif;">Confirm Service Completed</button>
                                                    </div>
                                                </form>
                                            @else
                                                <button class="btn btn-primary d-block w-100" type="button" disabled>Waiting for customer's confirmation</button>
                                            @endif
                                        @endif
                                        
                                        {{-- <div class="d-flex flex-column mb-3"><label class="form-label"><strong>Attachment</strong></label>
                                            <div class="row gx-2 gy-2 row-cols-1 row-cols-md-2 row-cols-xl-3" data-bss-baguettebox="">
                                                <div class="col"><a href="https://cdn.bootstrapstudio.io/placeholders/1400x800.png"><img class="img-fluid" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png"></a></div>
                                            </div>
                                            <p style="margin-top: 8px;border-radius: 0px;padding: 0px;border: 1px none rgb(214,214,214);"></p>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <x-advertisement/>
                </div>
            </div>
        </x-authcontent>

    </x-authlayout>
@endauth
