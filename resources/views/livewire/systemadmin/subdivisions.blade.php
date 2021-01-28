<div>
         <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1>
                    Subdvisions
                </h1>
                </div>
                <div class="col-sm-6">
                    <button type="button" data-toggle="modal" data-target="#add-or-update-subdivision" class="btn btn-primary float-right"><i class="fas fa-sitemap"></i> Add Subdivision</button>
                </div>
            </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-tabs">
                        <div class="card-header p-0 pt-1">
                          <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" id="regions-tab" data-toggle="pill" href="#regions" role="tab" aria-controls="regions" aria-selected="true" wire:ignore>Regions</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="districts-tab" data-toggle="pill" href="#districts" role="tab" aria-controls="districts" aria-selected="false" wire:click="$set('showDistricts','true')" wire:ignore>Districts</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="townsvillages-tab" data-toggle="pill" href="#townsvillages" role="tab" aria-controls="townsvillages" aria-selected="false" wire:click="$set('showTownsVillages','true')" wire:ignore>Towns/Villages</a>
                            </li>
                          </ul>
                        </div>
                        <div class="card-body">
                          <div class="tab-content" id="custom-tabs-one-tabContent">
                            <div class="tab-pane fade show active" id="regions" role="tabpanel" aria-labelledby="regions-tab" wire:ignore.self>
                              <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Region Name</th>
                                        <th>Date Added</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($regions as $region)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $region->region_name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($region->created_at)->diffForHumans() }}</td>
                                        <td>
                                          <button type="button" data-toggle="modal" data-target="#add-or-update-subdivision" class="btn btn-danger btn-sm" title="Edit" wire:click="$emit('editSubdivision','regions','{{json_encode($region)}}')"><i class="fas fa-edit "></i></button>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center"><b>No Regions added in the system</b></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            </div>
                            <div class="tab-pane fade" id="districts" role="tabpanel" aria-labelledby="districts-tab" wire:ignore.self>
                              @if ($showDistricts)
                                  <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>District Name</th>
                                            <th>Region</th>
                                            <th>Date Added</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($districts as $district)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $district->district_name }}</td>
                                            <td>{{ $district->region_name }}</td>
                                            <td>{{ \Carbon\Carbon::parse($district->created_at)->diffForHumans() }}</td>
                                            <td>
                                                <a type="button" data-toggle="modal" data-target="#add-or-update-subdivision" class="btn btn-danger btn-sm" title="Edit" wire:click="$emit('editSubdivision','districts','{{json_encode($district)}}')"><i class="fas fa-edit "></i></a>
                                            </td>
                                        </tr>
                                        @empty
                                            <tr>
                                                <td colspan="10" class="text-center"><b>No Districts added in the system</b></td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>   
                              @endif
                                
                            </div>
                            <div class="tab-pane fade" id="townsvillages" role="tabpanel" aria-labelledby="townsvillages-tab" wire:ignore.self>
                                @if($showTownsVillages)
                                    <table id="example2" class="table table-bordered table-hover">
                                      <thead>
                                          <tr>
                                              <th>#</th>
                                              <th>Towns/Village Name</th>
                                              <th>District</th>
                                              <th>Date Added</th>
                                              <th>Actions</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          @forelse ($townsVillages as $townvillage)
                                          <tr>
                                              <td>{{ $loop->iteration }}</td>
                                              <td>{{ $townvillage->town_or_village_name }}</td>
                                              <td>{{ $townvillage->district_name }}</td>
                                              <td>{{ \Carbon\Carbon::parse($townvillage->created_at)->diffForHumans() }}</td>
                                              <td>
                                                <a type="button" data-toggle="modal" data-target="#add-or-update-subdivision" class="btn btn-danger btn-sm" title="Edit" wire:click.prevent="$emit('editSubdivision','towns_villages','{{json_encode($townvillage)}}')"><i class="fas fa-edit "></i></a>
                                              </td>
                                          </tr>
                                          @empty
                                              <tr>
                                                  <td colspan="10" class="text-center"> <b>No Towns/Villages added in the system</b></td>
                                              </tr>
                                          @endforelse
                                      </tbody>
                                  </table>
                                @endif
                            </div>
                          </div>
                        </div>
                        <!-- /.card -->
                      </div>
                </div>
            </div>
            @livewire('systemadmin.add-subdivision')
        </div>
        @section('page-level-header-files')
          <!-- SweetAlert2 -->
          <link rel="stylesheet" href="/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
        @endsection
        @section('page-level-footer-files')
          <!-- SweetAlert2 -->
          <script src="/plugins/sweetalert2/sweetalert2.min.js"></script>
          <script src="/js/custom.js"></script>
        @endsection
</div>
