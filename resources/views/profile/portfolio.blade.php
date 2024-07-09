@auth
    <x-authlayout>
        
        <x-authcontent>
           
            
            <x-authprofile totalBookings="{{ $totalBookings }}" totalRequests="{{ $totalRequests }}" :user="$user">
            
            <div class="card mb-5" style="margin-top: -25px;">
                <div class="card-body p-sm-5">
                    <div class="mb-3">
                        @if (Auth::user()->id == $user->id)
                            <form action="{{ route('portfolio.store') }}" method="post" style="margin-bottom: 20px;" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3"><label class="form-label"><strong>Add photo</strong></label>
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <input class="form-control" name="image" type="file" style="@error('image') border-color: rgb(205,68,59); @enderror"></div>
                                    @error('image')
                                        <p class="text-start" style="margin-top: 0px; font-size: 12px;color: rgb(205,68,59);">{{ $message }}</p>
                                    @enderror
                                <div>
                                <button class="btn btn-primary d-block w-100" type="submit">Upload</button></div>
                            </form>
                        @endif
                        <p class="text-start" style="margin-top: 8px;"><strong>{{ $picturesCount > 0 ? ($picturesCount == 1 ? $picturesCount . ' picture' : $picturesCount . ' pictures') : 'No pictures'  }}</strong></p>
                        <div class="row gx-2 gy-2 row-cols-1 row-cols-md-2 row-cols-xl-3" data-bss-baguettebox="">
                            @foreach ($pictures as $picture)
                                <div class="col">
                                    <div class="img-container">

                                        <a href="{{ asset('storage/' . $picture->image) }}">
                                            <img class="object-cover img-thumbnail" src="{{ asset('storage/' . $picture->image) }}" >
                                        </a>
                                        @if (Auth::user()->id == $user->id)
                                        <form class="btn" action="{{ route('portfolio.destroy', $picture)}}" style="position: absolute;transform: translate(-28px) translateX(-25px) translateY(-8px) scale(0.61);padding: -6px 12px;" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-primary" type="submit" >
                                                <i class="far fa-trash-alt" style="transform: scale(1.34);"></i>
                                            </button>
                                        </form>
                                        @endif 
                                    </div>
                                </div>    
                            @endforeach   
                        </div>
                    </div>
                </div>
            </div>

           </x-authprofile>
            
        </x-authcontent>

    </x-authlayout>
@endauth