@auth
    
    <x-authlayout>
        
        <x-authcontent>
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <button id="goBackButton" style="border-style: none;background: #00000000;color: #4e73df;">&larr; Go back</button>
                        <div class="d-sm-flex justify-content-between align-items-center mb-4">
                            <h2 class="fw-bolder text-dark mb-0">Final Quote Details</h2>
                        </div>
                        <div class="row gy-4 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-2 d-xl-flex justify-content-xl-center align-items-xl-center" style="margin-bottom: 24px;">
                            <div class="col-auto col-md-8 col-lg-6 col-xl-5 col-xxl-4" style="width: 871.094px;">
                                <div class="card mb-5">
                                    <div class="card-body p-sm-5">
                                        <form action="{{ route('quotes.update', $quote) }}" method="post" style="margin-top: 0px;">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="service_request_id" value="{{ $quote }}">
                                            <input type="hidden" name="amount" value="{{ $quote->amount }}">
                                            <div class="mb-3">
                                                <label class="form-label"><strong>Final quote</strong></label>
                                                <input name="finalAmount" class="form-control" type="number" placeholder="The final agreed-upon price of your service for this job." style="@error('finalAmount') border-color: rgb(205,68,59); @enderror">
                                                @error('finalAmount')
                                                    <p class="text-start" style="margin-top: 0px; font-size: 12px;color: rgb(205,68,59);">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div>
                                                <button class="btn btn-primary d-block w-100" type="submit">Submit quote</button>
                                            </div>
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