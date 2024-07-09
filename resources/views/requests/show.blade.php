@auth
    <x-authlayout>
        
        <x-authcontent>
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <button id="goBackButton" style="border-style: none;background: #00000000;color: #4e73df;">&larr; Go back</button>
                        <div class="d-sm-flex justify-content-between align-items-center mb-4">
                            <h2 class="fw-bolder text-dark mb-0">Request Details</h2>
                        </div>
                        <div class="row gy-4 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-2 d-xl-flex justify-content-xl-center align-items-xl-center" style="margin-bottom: 24px;">
                            <div class="col-auto col-md-8 col-lg-6 col-xl-5 col-xxl-4" style="width: 871.094px;">
                                <div class="card mb-5">
                                    <div class="card-body p-sm-5">
                                        <div class="d-flex">
                                            @if ($request->user->image == null)
                                                <img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png">
                                            @else
                                                <img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src=" {{ asset('storage/' . $request->user->image) }}">
                                            @endif
                                            <div class="d-inline-flex flex-fill justify-content-between">
                                                <div>
                                                    <a style="text-decoration: none;" href="{{ route('profile', ['user' => $request->user]) }}" wire:navigate>
                                                        <p class="fw-bold mb-0">{{ $request->user->fname.' '.$request->user->lname }}</p>
                                                    </a>
                                                </div>
                                                <div>
                                                    <p class="fw-bold mb-0">
                                                        <span style="font-weight: normal !important; color: rgb(78, 115, 223);">
                                                            @if ($request->created_at == $request->updated_at)
                                                                {{ $request->created_at->diffForHumans()}}
                                                            @else
                                                                Updated {{ $request->updated_at->diffForHumans()}}
                                                            @endif
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3" style="margin-top: 22px;">
                                            <p style="margin-top: 8px;border-radius: 0px;padding: 0px;border: 1px none rgb(214,214,214);"><strong>Service type</strong></p>
                                            <p style="margin-top: 8px;border-radius: 5px;padding: 9px;border: 1px solid rgb(214,214,214);">{{ $request->type }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <p style="margin-top: 8px;border-radius: 0px;padding: 0px;border: 1px none rgb(214,214,214);"><strong>Service description</strong></p>
                                            <p style="margin-top: 8px;border-radius: 5px;padding: 9px;border: 1px solid rgb(214,214,214);">{{ $request->description }}</p>
                                        </div>
                                        <div class="mb-5"><label class="form-label"><strong>Location description</strong></label>
                                            <p style="margin-top: 8px;border-radius: 5px;padding: 9px;border: 1px solid rgb(214,214,214);">{{ $request->location }}</p>
                                        </div>
                                        
                                        {{-- <div class="d-flex flex-column mb-3"><label class="form-label"><strong>Attachment</strong></label>
                                            <div class="row gx-2 gy-2 row-cols-1 row-cols-md-2 row-cols-xl-3" data-bss-baguettebox="">
                                                <div class="col"><a href="https://cdn.bootstrapstudio.io/placeholders/1400x800.png"><img class="img-fluid" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png"></a></div>
                                            </div>
                                            <p style="margin-top: 8px;border-radius: 0px;padding: 0px;border: 1px none rgb(214,214,214);"></p>
                                        </div> --}}
                                        
                                        @if (Auth::user()->acctype == 'customer')    
                                            @if ($bookedRequest == false)
                                                <div class="d-flex flex-fill" style="margin-top: 20px;">
                                                    <a class="flex-grow-1 me-2" href="{{ route('requests.edit', $request) }}" wire:navigate>                                                                                        
                                                        <button class="btn btn-primary w-100" type="submit" style="font-family: 'Libre Franklin', sans-serif;">Edit</button>
                                                    </a>
                                                    <form action="{{ route('requests.destroy', $request) }}" method="post" class="flex-grow-1">
                                                        @csrf
                                                        @method('DELETE')
                                                
                                                        <button class="btn w-100" type="submit" style="background: #df4e4e; color: white; font-family: 'Libre Franklin', sans-serif;">Delete</button>
                                                    </form>
                                                </div>
                                            @endif
                                        @else
                                            @if ($bookedRequest == false)
                                                @if (!$userHasQuote)
                                                    <div>
                                                        <a href="{{ route('submit_quote', ['request'=>$request] ) }}" wire:navigate>
                                                            <button class="btn btn-primary d-block w-100" type="submit">Want to take on this job?</button>
                                                        </a>
                                                    </div>
                                                @else
                                                    <div>
                                                        <button class="btn btn-primary d-block w-100" type="submit" disabled>You already submitted a quote.</button>
                                                    </div>
                                                @endif
                                            @endif
                                        @endif
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
