<div>
    @section('title','Application Payment')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="card-title">Payment for {{$application->application_type}}</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if ($is_error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{$message}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>  
                    @endif
                    <div class="row">
                        {{-- left side --}}
                        <div class="col-sm-12 col-md-6">
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="name">Total Amount:</label>
                                    <p><strong>GMD</strong>{{$fee}}</p>
                                </div>
                            </div> 
                        </div>
                        {{-- right side --}}
                        <div class="col-sm-12 col-md-6">
                            <form wire:submit.prevent="processPayment">
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <label for="name">Application Token: <sup class="text-danger">*</sup></label>
                                        <input type="text" wire:model="serial_code" class="form-control" placeholder="Enter the Token you bought">
                                        @error('serial_code')
                                            <span class="text-danger mt-1">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 d-flex justify-content-center">
                                        <button type="submit" id="submit" class="btn btn-success btn-square btn-block">Submit</button>
                                    </div>
                                    <div class="col-sm-6 d-flex justify-content-center">
                                        <button type="submit" id="submit" class="btn btn-info btn-square btn-block" wire:click.prevent="redirectBack">Back</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> 
                </div>
        </div>
        </div>
     </div>
</div>
