<div>
    @section('page-title','Student Details Bulk Import')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Student Details Bulk Import</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container">
            <div class="card h-100">
                <div class="card-header">
                    <h3 class="card-title">Students DataCollection Import</h3>
                </div>
                
                <div class="card-body">
                    <form wire:submit.prevent="importData">
                        <div class="form-group" wire:ignore>
                            <select id="learning_center" class="form-control select2" wire:model="learning_center">
                                <option>--- select learning center ---</option>
                                @foreach ($learningcenters as $id =>  $center)
                                    <option value="{{$id}}">{{$center}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control" wire:model="excel_file">
                            @error('excel_file') <span class="text-danger mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Start Import</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @section('scripts')
    <script>

        $(document).ready(function() {
    
            $('.select2').select2();
    
            $('.select2').on('change', function (e) {
                
                var data = $('#'+$(this).attr('id')).select2("val");
    
                @this.set(`${$(this).attr('id')}`, data);
    
            });
        });
    
    </script>
    @endsection
</div>
