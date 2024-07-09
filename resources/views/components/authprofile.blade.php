
@auth
    @props(['user', 'totalBookings', 'totalRequests'])
           
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                
                <button id="goBackButton" style="border-style: none;background: #00000000;color: #4e73df;">&larr; Go back</button>
                
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h2 class="fw-bolder text-dark mb-0">Profile</h2>
                </div>
                <div class="row gy-4 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-2 d-xl-flex justify-content-xl-center align-items-xl-center" style="margin-bottom: 24px;">
                    <div class="col-auto col-md-8 col-lg-6 col-xl-5 col-xxl-4" style="width: 871.094px;">
                        <div class="card mb-5">
                            <div class="card-body p-sm-5">
                                @if (session('success'))                         
                                    <x-flashMsg msg="{{ session('success') }}" mt="0 0 25px 0"/>
                                @elseif(session('delete'))
                                    <x-flashMsg msg="{{ session('delete') }}" bg="danger" mt="0 0 25px 0"/>
                                @elseif(Auth::user()->id == $user->id && $user->contactnum == 'No information provided.')
                                    <x-flashMsg msg="Finish your profile by setting up your contact number and subdivision in Edit Profile." bg="warning" mt="0 0 25px 0"/>
                                @endif
                                <div class="d-flex">
                                    @if ($user->image == null)
                                        <a href="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" data-bss-baguettebox="">
                                            <img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png">
                                        </a>
                                    @else
                                        <a href="{{ asset('storage/' . $user->image) }}" data-bss-baguettebox="">
                                            <img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="{{ asset('storage/' . $user->image) }}">
                                        </a>
                                    @endif
                                    <div class="text-center d-flex flex-fill justify-content-around" style="margin-bottom: 8px;margin-top: 0px;">
                                        @if ($user->acctype == 'handyman')
                                            <div>
                                                <h6 style="font-weight: bold;">Services done</h6>
                                                <h5>{{ $totalBookings }}</h5>
                                            </div>
                                        @else
                                            <div>
                                                <h6 style="font-weight: bold;">Requests done</h6>
                                                <h5>{{ $totalRequests }}</h5>
                                            </div>
                                        @endif
                                        
                                        <div>
                                            <h6 style="font-weight: bold;">Subdivision</h6>
                                            <h5>{{ $user->subdivision }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-inline-flex flex-fill justify-content-between">
                                    <div>
                                        <p class="fw-bold mb-0">{{ $user->fname }} {{ $user->lname }}</p>
                                        <p class="text-muted mb-0">{{ Str::ucfirst($user->acctype) }}</p>
                                    </div>
                                    <div></div>
                                </div>
                                @if (Auth::user()->id == $user->id)
                                    <div class="d-flex flex-fill justify-content-between" style="margin-top: 22px;">
                                        <a href="{{ route('profile_edit', $user)}}" class="d-flex flex-grow-1"  style="text-decoration:none;">
                                            <button class="btn btn-outline-primary d-block w-100" type="submit" style="margin-right: 10px;font-family: 'Libre Franklin', sans-serif;">Edit profile</button>
                                        </a>
                                        <a href="{{ route('profile_settings', $user)}}" class="d-flex flex-grow-1" style="text-decoration:none;">
                                            <button class="btn btn-outline-primary d-block w-100" type="submit" style="font-family: 'Libre Franklin', sans-serif;">Account settings</button>
                                        </a>
                                    </div>
                                    @if ($user->acctype == 'handyman')
                                        <x-authhandymanpages :user="$user"/>
                                    @endif
                                @elseif ($user->acctype == 'handyman')
                                    <x-authhandymanpages :user="$user"/>
                                @endif
                            </div>
                        </div>
                        {{ $slot }}
                    </div>
                </div>
            </div>
            <x-advertisement/>
        </div>
    </div>

@endauth