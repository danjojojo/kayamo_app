@auth
    
    <x-authlayout>
        
        <x-authcontent>
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <button id="goBackButton" style="border-style: none;background: #00000000;color: #4e73df;">&larr; Go back</button>
                        <div class="d-sm-flex justify-content-between align-items-center mb-4">
                            <h2 class="fw-bolder text-dark mb-0">Account Settings</h2>
                        </div>
                        <div class="row gy-4 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-2 d-xl-flex justify-content-xl-center align-items-xl-center" style="margin-bottom: 24px;">
                            <div class="col-auto col-md-8 col-lg-6 col-xl-5 col-xxl-4" style="width: 871.094px;">
                                <div class="card mb-5">
                                    <div class="card-body p-sm-5">
                                        
                                        <div class="mb-4">
                                            <a href="{{ route('profile_email', $user)}}" class="d-flex flex-grow-1">
                                                <button class="btn btn-primary d-block w-100" type="submit">Change email address &rarr;</button>
                                            </a>
                                        </div>

                                        <div>
                                            <a href="{{ route('profile_password', $user)}}" class="d-flex flex-grow-1">
                                                <button class="btn btn-primary d-block w-100" type="submit">Change password &rarr;</button>
                                            </a>
                                        </div>
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