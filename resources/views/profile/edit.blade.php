@auth
    
    <x-authlayout>
        
        <x-authcontent>
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <button id="goBackButton" style="border-style: none;background: #00000000;color: #4e73df;">&larr; Go back</button>
                        <div class="d-sm-flex justify-content-between align-items-center mb-4">
                            <h2 class="fw-bolder text-dark mb-0">Edit Profile</h2>
                        </div>
                        <div class="row gy-4 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-2 d-xl-flex justify-content-xl-center align-items-xl-center" style="margin-bottom: 24px;">
                            <div class="col-auto col-md-8 col-lg-6 col-xl-5 col-xxl-4" style="width: 871.094px;">
                                <div class="card mb-5">
                                    <div class="card-body p-sm-5">
                                        <form action="{{ route('profile.update', $user)}}" method="post" style="margin-top: 0px;" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')  
                                            <div class="mb-3">
                                                <label class="form-label"><strong>Profile picture</strong></label>
                                                <input class="form-control" type="file" name="image" style="@error('image') border-color: rgb(205,68,59); @enderror">
                                                @error('image')
                                                    <p class="text-start" style="margin-top: 0px; font-size: 12px;color: rgb(205,68,59);">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label"><strong>First name</strong></label>
                                                <input class="form-control" type="text" name="fname" value="{{ $user->fname }}" style="@error('fname') border-color: rgb(205,68,59); @enderror">
                                                @error('fname')
                                                    <p class="text-start" style="margin-top: 0px; font-size: 12px;color: rgb(205,68,59);">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label"><strong>Last name</strong></label>
                                                <input class="form-control" type="text" name="lname" value="{{ $user->lname }}" style="@error('lname') border-color: rgb(205,68,59); @enderror">
                                                @error('lname')
                                                    <p class="text-start" style="margin-top: 0px; font-size: 12px;color: rgb(205,68,59);">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label"><strong>Subdivision</strong></label>
                                                <select class="form-select" name="subdivision" style="@error('subdivision') border-color: rgb(205,68,59); @enderror">
                                                    <option value="" selected disabled>Select subdivision</option>
                                                    @php
                                                        $subdivisions = [
                                                            'Brillianz Residences',
                                                            'Buena Rosario Communities',
                                                            'Citadel Residences',
                                                            'Mabuhay City',
                                                            'Oroville Subdivision',
                                                            'Villa Palao'
                                                        ];
                                                    @endphp
                                                    @foreach($subdivisions as $subdivision)
                                                        <option value="{{ $subdivision }}" {{ $user->subdivision == $subdivision ? 'selected' : '' }}>
                                                            {{ $subdivision }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('subdivision')
                                                    <p class="text-start" style="margin-top: 0px; font-size: 12px;color: rgb(205,68,59);">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label"><strong>Contact number</strong></label>
                                                <input class="form-control" type="text" name="contactnum" value="{{ $user->contactnum == 'No information provided.' ? '' : $user->contactnum  }}" style="@error('contactnum') border-color: rgb(205,68,59); @enderror" placeholder="{{ $user->contactnum == 'No information provided.' ? 'No information provided.' : '' }}">
                                                @error('contactnum')
                                                    <p class="text-start" style="margin-top: 0px; font-size: 12px;color: rgb(205,68,59);">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label"><strong>About me</strong></label>
                                                <textarea class="form-control" name="aboutme" id="about" cols="30" rows="3" placeholder="{{ $user->aboutme == 'No information provided.' ? 'No information provided.' : '' }}">{{ $user->aboutme == 'No information provided.' ? '' : $user->aboutme }}</textarea>
                                            </div>
                                            <div>
                                                <button class="btn btn-primary d-block w-100" type="submit">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card" style="margin-bottom: 24px;"><img class="card-img-top w-100 d-block fit-cover" style="height: 200px;" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png">
                            <div class="card-body p-4">
                                <p class="text-primary card-text mb-0">Ad</p>
                                <h4 class="card-title">Lorem libero donec</h4>
                                <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-authcontent>
        
    </x-authlayout>

@endauth