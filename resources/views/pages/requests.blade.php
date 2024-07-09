@auth
    <x-authlayout>
        
        <x-authcontent>
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="d-sm-flex justify-content-between align-items-center mb-4">
                            <h2 class="fw-bolder text-dark mb-0">Requests</h2>
                        </div>
                        
                        @if (Auth::user()->acctype == 'customer')
                            {{-- CREATE REQUEST BUTTON --}}
                            <a href="{{ route('services.index') }}" wire:navigate>
                                <div class="text-white bg-primary border rounded border-primary d-flex flex-column justify-content-between flex-lg-row p-4 p-md-5">
                                    <div class="pb-2 pb-lg-1">
                                        <h3 class="fw-bold mb-2">Need someone to do a job?</h3>
                                        <p class="mb-0">Click here to make a service request.</p>
                                    </div>
                                </div>
                            </a>
                            {{-- MESSAGE --}}
                            @if (session('success'))
                                <x-flashMsg msg="{{ session('success') }}"/>
                            @elseif(session('delete'))
                                <x-flashMsg msg="{{ session('delete') }}" bg="danger"/>
                            @endif
                        @else
                            <div class="text-white bg-primary border rounded border-primary d-flex flex-column justify-content-between flex-lg-row p-4 p-md-5">
                                <div class="pb-2 pb-lg-1">
                                    <h3 class="fw-bold mb-2">Want to work on a job?</h3>
                                    <p class="mb-0">Refresh to see new requests.</p>
                                </div>
                            </div>
                        @endif

                        {{-- REQUESTS --}}
                        <div class="row gy-4 row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1" style="margin-bottom: 24px;margin-top: 0px;">
                            {{-- REQUEST START --}}
                            @if (count($requests) > 0)
                                @foreach ($requests as $request)
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-body p-4">
                                                <div class="d-flex">
                                                    @if ($request->user->image == null)
                                                        <img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png">
                                                    @else
                                                        <img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src=" {{ asset('storage/' . $request->user->image) }}">
                                                    @endif
                                                    <div class="d-inline-flex flex-fill justify-content-between">
                                                        <div>
                                                            {{--SUBMITTED BY --}}
                                                            <a style="text-decoration: none;" href="{{ route('profile', ['user' => $request->user]) }}" wire:navigate>
                                                                <p class="fw-bold mb-0">{{ $request->user->fname.' '.$request->user->lname }}</p>
                                                            </a>
                                                            {{--SERVICE TYPE --}}
                                                            <p class="text-muted mb-0">{{ $request->type}}</p>
                                                        </div>
                                                        <div>
                                                            {{-- SUBMIT TIME --}}
                                                            <p class="fw-bold mb-0"><span style="font-weight: normal !important; color: rgb(78, 115, 223);">
                                                                @if ($request->created_at == $request->updated_at)
                                                                    {{ $request->created_at->diffForHumans()}}
                                                                @else
                                                                    Updated {{ $request->updated_at->diffForHumans()}}
                                                                @endif
                                                            
                                                            </span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="text-primary card-text mb-0"></p>
                                                <h6 class="card-title" style="margin-top: 22px;">
                                                    {{-- DESCRIPTION --}}
                                                    {{ Str::words($request->description, 20) }}
                                                </h6>
                                                <a href="{{ route('requests.show', $request) }}" wire:navigate>
                                                    <button class="btn btn-primary float-end" type="button" style="background: rgb(78, 115, 223);">View</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                @if (Auth::user()->acctype == 'handyman')
                                    <x-blank msg="No customer service requests are currently available."/>
                                @else
                                    <x-blank msg="You haven't created a request yet."/>
                                @endif
                            @endif
                            {{-- REQUEST END --}}
                        </div>

                        <div>
                            {{ $requests->links() }}
                        </div>
                    </div>
                    <x-advertisement/>
                </div>
                
            </div>

            
        </x-authcontent>

    </x-authlayout>
@endauth