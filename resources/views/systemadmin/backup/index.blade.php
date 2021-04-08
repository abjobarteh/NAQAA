@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Backups</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                @can('manual_backup_access')
                <a href="{{route('admin.backup.manual')}}" class="btn btn-success float-right"><i class="fas fa-database"></i> Make Backup</a>
                @endcan
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
<!-- /.content-header --> 
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Backups List</h3>
                    </div>
                    <div class="card-body">
                        @foreach ($backups as $backup)
                            <div>
                                <span class="text-muted">{{$backup}}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection