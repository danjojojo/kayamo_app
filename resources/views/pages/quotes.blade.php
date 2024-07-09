@auth
    <x-authlayout>
        
        <x-authcontent>
            

            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="d-sm-flex justify-content-between align-items-center mb-4">
                            <h2 class="fw-bolder text-dark mb-0">Quotes</h2>
                        </div>

                        @if (Auth::user()->acctype == 'customer')
                            {{-- CREATE REQUEST BUTTON --}}
                            
                            <div class="text-white bg-primary border rounded border-primary d-flex flex-column justify-content-between flex-lg-row p-4 p-md-5 mb-4" >
                                <div class="pb-2 pb-lg-1">
                                    <h3 class="fw-bold mb-2">Handymen quotes will appear here.</h3>
                                    <p class="mb-0">Initial quote is the starting price of a handyman for your request.</p>
                                    <p class="mb-0">Contact handyman you'd like to hire to discuss the final quote.</p>
                                </div>
                            </div>
                            
                            {{-- MESSAGE --}}
                            @if (session('success'))
                                <x-flashMsg msg="{{ session('success') }}"/>
                            @elseif(session('delete'))
                                <x-flashMsg msg="{{ session('delete') }}" bg="danger"/>
                            @endif
                        @else
                            <div class="text-white bg-primary border rounded border-primary d-flex flex-column justify-content-between flex-lg-row p-4 p-md-5 mb-4">
                                <div class="pb-2 pb-lg-1">
                                    <h3 class="fw-bold mb-2">Your submitted quotes will appear here.</h3>
                                    <p class="mb-0">Initial quote is your service's starting price for a customer request.</p>
                                    <p class="mb-0">Final quote is the price discussed with a customer.</p>
                                </div>
                            </div>
                        @endif

                        <div class="row gy-4 row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1" style="margin-bottom: 24px;">
                            @if (session('success') && Auth::user()->acctype == 'handyman')
                                <div class="flex m-0">    
                                    <x-flashMsg msg="{{ session('success') }}"/>
                                </div>
                            @elseif (session('successAllowUpdate') && Auth::user()->acctype == 'customer')
                                <div class="flex m-0">    
                                    <x-flashMsg msg="{{ session('successAllowUpdate') }}"/>
                                </div>
                            @elseif (session('delete'))
                                <div class="flex m-0">    
                                    <x-flashMsg msg="{{ session('delete') }}" bg="danger"/>
                                </div>
                            @endif
                            @if (count($quotes) > 0)
                                @foreach ($quotes as $quote)
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-body p-4">
                                                <div class="d-flex">
                                                    @if ($quote->user->image == null)
                                                        <img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png">
                                                    @else
                                                        <img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src=" {{ asset('storage/' . $quote->user->image) }}">
                                                    @endif
                                                
                                                    <div class="d-inline-flex flex-fill justify-content-between">
                                                        <div>
                                                            <a style="text-decoration: none;" href="{{ route('profile', ['user' => $quote->user]) }}" wire:navigate>
                                                                <p class="fw-bold mb-0">{{ $quote->user->fname.' '.$quote->user->lname}}</p>
                                                            </a>
                                                            <p class="text-muted mb-0">{{ Str::ucfirst($quote->user->acctype )}}</p>
                                                        </div>
                                                        <div>
                                                            <p class="fw-bold mb-0"><span style="font-weight: normal !important; color: rgb(78, 115, 223);">{{ $quote->updated_at->diffForHumans() }}</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="text-primary card-text mb-0"></p>
                                                {{-- HEADING --}}
                                                @if (Auth::user()->acctype == 'handyman')
                                                    @if($quote->finalAmount == 0)
                                                        <h5 class="card-title" style="margin-top: 22px;">Your starting price for this job is</h5>                                    
                                                    @else
                                                        <h5 class="card-title" style="margin-top: 22px;">Your final price for this job is</h5>                                    
                                                    @endif
                                                @else
                                                    @if($quote->finalAmount == 0)
                                                        <h5 class="card-title" style="margin-top: 22px;">The handyman's starting price for this job is</h5>                                              
                                                    @else
                                                        <h5 class="card-title" style="margin-top: 22px;">The handyman's final price for this job is</h5>                                    
                                                    @endif
                                                @endif
                                                
                                                @if($quote->finalAmount == 0)
                                                    <h2 class="card-title">₱ {{ number_format($quote->amount, 2) }}</h2>                                             
                                                @else
                                                    <h2 class="card-title">₱ {{ number_format($quote->finalAmount, 2) }}</h2>                                                                       
                                                @endif
                                                <div class="border rounded-0" style="margin-bottom: 16px;padding: 16px;">
                                                    <div class="d-flex">
                                                        @if ($quote->serviceRequest->user->image == null)
                                                            <img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png">
                                                        @else
                                                            <img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src=" {{ asset('storage/' . $quote->serviceRequest->user->image) }}">
                                                        @endif
                                                        <div class="d-inline-flex flex-fill justify-content-between">
                                                            <div>
                                                                <a style="text-decoration: none;" href="{{ route('profile', ['user' => $quote->serviceRequest->user]) }}" wire:navigate>
                                                                    <p class="fw-bold mb-0">{{ $quote->serviceRequest->user->fname.' '.$quote->serviceRequest->user->lname }}</p>
                                                                </a>
                                                                <p class="text-muted mb-0">{{ $quote->serviceRequest->type }}</p>
                                                            </div>
                                                            <div>
                                                                <p class="fw-bold mb-0"><span style="font-weight: normal !important; color: rgb(78, 115, 223);">{{ $quote->serviceRequest->updated_at->diffForHumans() }}</span></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p style="margin-top: 8px;">{{ Str::words($quote->serviceRequest->description, 20) }}.</p>

                                                    <a href="{{ route('requests.show', $quote->serviceRequest->id) }}" wire:navigate>
                                                        <div class="d-flex flex-row-reverse">
                                                            <button class="btn btn-primary float-end" type="button" style="background: rgb(78, 115, 223);">View</button>
                                                        </div>
                                                    </a>
                                                    
                                                </div>
                                                {{-- BUTTONS --}}
                                                @if (Auth::user()->acctype == 'handyman')
                                                    @if($quote->allowUpdate == false)
                                                        <button class="btn btn-primary float-end" type="button" style="background: rgb(78, 115, 223);" disabled>Waiting...</button>
                                                    @else
                                                        @if($quote->finalAmount > 0)
                                                            <button class="btn btn-primary float-end" type="button" style="background: rgb(78, 115, 223);" disabled>Waiting...</button>
                                                        @else
                                                            <a href="{{ route('quotes.edit', $quote) }}" wire:navigate>
                                                                <button class="btn btn-primary float-end" type="button" style="background: rgb(78, 115, 223);">Provide final quote</button> 
                                                            </a>
                                                        @endif  
                                                    @endif
                                                @else
                                                    @if($quote->allowUpdate == false)
                                                        <form action="{{ route('quotes.update', $quote)}}" method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="allowUpdate" value="{{ 1 }}">
                                                            <button class="btn btn-primary float-end" type="submit" style="background: rgb(78, 115, 223);">Want to book!</button>
                                                        </form>
                                                    @else
                                                        @if($quote->finalAmount > 0)                                                 
                                                            <form action="{{ route('bookings.store', $quote)}}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="quote_id" value="{{ $quote->id }}">
                                                                <input type="hidden" name="service_request_id" value="{{ $quote->service_request_id }}">
                                                                <input type="hidden" name="user_id" value="{{ $quote->user_id }}">
                                                                <button class="btn btn-primary float-end" type="submit" style="background: rgb(78, 115, 223);">Book</button>
                                                            </form>
                                                        @else
                                                            <button class="btn btn-primary float-end" type="button" style="background: rgb(78, 115, 223);" disabled>Waiting...</button>  
                                                        @endif
                                                    @endif
                                                    <a href="{{ route('profile', ['user' => $quote->user_id]) }}" wire:navigate>
                                                        <button class="btn btn-primary float-end" type="button" style="margin-right:10px; background: rgb(223, 131, 78); border: 1px solid rgb(223, 131, 78);">View Profile</button>
                                                    </a>
                                                @endif
                                                
                                                {{-- DECLINE --}}
                                                <form action="{{ route('quotes.destroy', $quote) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')   
                                                    <button class="btn btn-outline-primary float-end" type="submit" style="margin-right: 10px;">Decline</button>                                       
                                                </form> 
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                @if (Auth::user()->acctype == 'handyman')
                                    <x-blank msg="You haven't submitted any quotes. Visit Requests to send one."/>
                                @else
                                    <x-blank msg="There are currently no quotes from handymen."/>
                                @endif
                            @endif
                            
                        </div>
                        <div>
                            {{ $quotes->links() }}
                        </div>
                    </div>
                    <x-advertisement/>
                </div>
            </div>

            
        </x-authcontent>

    </x-authlayout>
@endauth