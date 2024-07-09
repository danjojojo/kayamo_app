@auth
    
    <x-authlayout>
        
        <x-authcontent>
            
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <button id="goBackButton" style="border-style: none;background: #00000000;color: #4e73df;">&larr; Go back</button>
                        <div class="d-sm-flex justify-content-between align-items-center mb-4">
                            <h2 class="fw-bolder text-dark mb-0">Rate</h2>
                        </div>
                        <div class="row gy-4 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-2 d-xl-flex justify-content-xl-center align-items-xl-center" style="margin-bottom: 24px;">
                            <div class="col-auto col-md-8 col-lg-6 col-xl-5 col-xxl-4" style="width: 871.094px;">
                                <div class="card mb-5">
                                    <div class="card-body p-sm-5">
                                        <div class="d-flex">
                                        @if ($booking->user->image == null)
                                            <img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png">
                                        @else
                                            <img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src=" {{ asset('storage/' . $booking->user->image) }}">
                                        @endif
                                            <div class="d-inline-flex flex-fill justify-content-between">
                                                <div>
                                                    <p class="fw-bold mb-0">{{ $booking->user->fname }} {{ $booking->user->lname }}</p>
                                                    <p class="text-muted mb-0">{{ Str::ucfirst($booking->user->acctype) }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="{{ route('reviews.store')}}" method="post" style="margin-top: 0px;">
                                            @csrf
                                            <div class="mb-3" style="margin-top: 22px;">
                                                <label class="form-label"><strong>Rating</strong></label>
                                                <div class=" d-flex">
                                                    
                                                    <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                                                    <input type="hidden" name="user_id" value="{{ $booking->serviceRequest->user->id }}">
                                                    <div class="rating"> 
                                                        <input type="radio" name="rating" value="5" id="5">
                                                        <label for="5">☆</label> 
                                                        <input type="radio" name="rating" value="4" id="4">
                                                        <label for="4">☆</label> 
                                                        <input type="radio" name="rating" value="3" id="3">
                                                        <label for="3">☆</label> 
                                                        <input type="radio" name="rating" value="2" id="2">
                                                        <label for="2">☆</label> 
                                                        <input type="radio" name="rating" value="1" id="1" checked>
                                                        <label for="1">☆</label> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label"><strong>Review</strong></label>
                                                <textarea class="form-control" id="message-2" name="review" rows="6" placeholder="Tell us how satisfied you are with the handyman's service." style="@error('review') border-color: rgb(205,68,59); @enderror"></textarea>
                                                @error('review')
                                                    <p class="text-start" style="margin-top: 0px; font-size: 12px;color: rgb(205,68,59);">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="d-flex flex-fill justify-content-between"><button class="btn btn-primary d-block w-100" type="submit" style="margin-right: 0px;font-family: 'Libre Franklin', sans-serif;">Submit</button></div>
                                        </form>
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