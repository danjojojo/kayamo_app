@auth
    <x-authlayout>
        
        <x-authcontent>
           
           <x-authprofile totalBookings="{{ $totalBookings }}" totalRequests="{{ $totalRequests }}" :user="$user">

                <div class="card mb-5" style="margin-top: -25px;">
                    <div class="card-body p-sm-5">
                        <div class="mb-3">
                            <p style="margin-top: 8px;"><strong>Contact number</strong></p>
                            <p style="margin-top: 8px;border-radius: 0px;padding: 9px;border: 1px solid rgb(214,214,214);">{{ $user->contactnum }}</p>
                        </div>
                        <div class="mb-3">
                            <p style="margin-top: 8px;"><strong>About me</strong></p>
                            <p style="margin-top: 8px;border-radius: 0px;padding: 9px;border: 1px solid rgb(214,214,214);">{{ $user->aboutme }}</p>
                        </div>
                    </div>
                </div>

           </x-authprofile>
            
        </x-authcontent>

    </x-authlayout>
@endauth