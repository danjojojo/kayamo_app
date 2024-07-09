@auth
    <x-authlayout>
        
        <x-authcontent>
           
           <x-authprofile totalBookings="{{ $totalBookings }}" totalRequests="{{ $totalRequests }}" :user="$user">

            <div class="card mb-5" style="margin-top: -25px;">
                <div class="card-body p-sm-5">
                    <div class="mb-3">
                        
                        @if ($averageRating != 0)
                            <h5>Overall Rating: <strong> {{ number_format($averageRating, 1) }} </strong> </h5>
                        @endif
                        @if ($ratedBookingsCount != 0)
                            <p class="text-start" style="margin-top: 18px;"><strong>Based on {{ $ratedBookingsCount }} {{ $ratedBookingsCount > 1 ? 'reviews' : 'review' }}</strong></p>
                        @else
                        <p class="text-start" style="margin-top: 18px;"><strong>No reviews</strong></p>
                        @endif
                    </div>
                    @foreach ($reviews as $review)
                        <div class="border rounded-0" style="margin-bottom: 16px;padding: 16px;">
                            <div class="d-flex">
                                @if ($review->booking->serviceRequest->user->image == null)
                                    <img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png">
                                @else
                                    <img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src=" {{ asset('storage/' . $review->booking->serviceRequest->user->image) }}">
                                @endif
                                <div class="d-inline-flex flex-fill justify-content-between">
                                    <div>
                                        <a style="text-decoration: none;" href="{{ route('profile', ['user' => $review->booking->serviceRequest->user]) }}" wire:navigate>
                                            <p class="fw-bold mb-0">{{ $review->booking->serviceRequest->user->fname }} {{ $review->booking->serviceRequest->user->lname }}</p>
                                        </a>
                                        <p class="text-muted mb-0">{{ Str::ucfirst($review->booking->serviceRequest->user->acctype) }}</p>
                                        <div>
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $review->rating)
                                                    <span class="fa fa-star checked" style="color: rgb(255,165,0);"></span>
                                                @else
                                                <span class="fa fa-star checked" style="color: rgb(187, 187, 187);"></span>
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                    <div>
                                        <p class="fw-bold mb-0"><span style="font-weight: normal !important; color: rgb(78, 115, 223);">{{ $review->created_at->diffForHumans() }}</span></p>
                                    </div>
                                </div>
                            </div>
                            <p style="margin-top: 8px;">{{ $review->review }}</p>
                        </div>
                    @endforeach
                </div>
                <div>
                    {{ $reviews->links() }}
                </div>
            </div>

           </x-authprofile>
            
        </x-authcontent>

    </x-authlayout>
@endauth