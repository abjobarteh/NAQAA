<div>
    @section('title','View Letter of Interim Authorisation Application')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="card-title">View Application for Letter of Interim Authorisation</h4>
                        </div>
                        <div class="col-sm-6 d-flex justify-content-end">
                            <a href="{{route('portal.institution.interim-authorisation')}}" class="btn btn-success btn-square mr-1">
                                <i class="fas fa-list"></i> 
                                Interim Authorisations
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label for="name">Proposed Institution Name: <sup class="text-danger">*</sup></label>
                        <input type="text" wire:model="proposed_name" class="form-control">
                        @error('proposed_name')
                            <span class="text-danger mt-1">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label for="address">Street Address: <sup class="text-danger">*</sup></label>
                        <input type="text" id="address" wire:model="address" class="form-control">
                        @error('address')
                            <span class="text-danger mt-1">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label for="region_id">Region: <sup class="text-danger">*</sup></label>
                        <select wire:model="region_id" id="region_id" class="form-control custom-select">
                            <option value="">--- select region ---</option>
                            @foreach ($regions as $id => $region)
                                <option value="{{$id}}">{{$region}}</option>
                            @endforeach
                        </select>
                        @error('region_id')
                            <span class="text-danger mt-1">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="district_id">District: <sup class="text-danger">*</sup></label>
                        <select wire:model="district_id" id="district_id" class="form-control custom-select">
                            <option value="">--- select district ---</option>
                            @foreach ($districts as $id => $district)
                                <option value="{{$id}}">{{$district}}</option>
                            @endforeach
                        </select>
                        @error('district_id')
                            <span class="text-danger mt-1">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="town_village_id">Town/village:</label>
                        <select wire:model="town_village_id" id="town_village_id" class="form-control custom-select">
                            <option value="">--- select Town/village ---</option>
                            @foreach ($townvillages as $id => $townvillage)
                                <option value="{{$id}}">{{$townvillage}}</option>
                            @endforeach
                        </select>
                        @error('town_village_id')
                            <span class="text-danger mt-1">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <hr>
                <h4 class="card-title mx-2">Governance Structure</h4>
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label for="vision">Vision: <sup class="text-danger">*</sup></label>
                        <textarea type="text" id="vision" wire:model="vision" class="form-control"></textarea>
                        @error('vision')
                            <span class="text-danger mt-1">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="mission">Mission: <sup class="text-danger">*</sup></label>
                        <textarea type="text" id="mission" wire:model="mission" class="form-control"></textarea>
                        @error('mission')
                            <span class="text-danger mt-1">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="organogramme">Organogramme:</label>
                        <input type="file" id="organogramme" wire:model="organogramme" class="form-control">
                        @error('organogramme')
                            <span class="text-danger mt-1">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12">
                        <label for="objectives">Objectives: <sup class="text-danger">*</sup></label>
                        <textarea wire:model="objectives" class="form-control" cols="30" rows="10"></textarea>
                        @error('objectives')
                            <span class="text-danger mt-1">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Details of Promoters</h4>
                                <table class="table table-responsive-sm">
                                    <thead>
                                        <tr>
                                        <th>Fullname</th>
                                        <th>Date of birth</th>
                                        <th>Occupation</th>
                                        <th>address</th>
                                        <th>Passport copy</th>
                                        <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($promoter_inputs as $key => $value)
                                        <tr>
                                        <td>
                                            <input type="text" wire:model="promoter_fullname.{{$value}}" class="form-control">
                                            @error('promoter_fullname.'.$value)
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="date" wire:model="promoter_dob.{{$value}}" class="form-control">
                                            @error('promoter_dob.'.$value)
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" wire:model="promoter_occupation.{{$value}}" class="form-control">
                                            @error('promoter_occupation.'.$value)
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" wire:model="promoter_address.{{$value}}" class="form-control">
                                        <td>
                                            <a href="{{$value}}" target="_blank" class="btn btn-info">Download</a>
                                        </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <h4 class="card-title mx-2">Sources of Funding</h4>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-responsive-sm">
                                    <thead>
                                        <tr>
                                        <th>Source Name</th>
                                        <th>Evidence</th>
                                        <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($funding_inputs as $key => $value)
                                        <tr>
                                        <td>
                                            <input type="text" id="funding_name" wire:model="funding_name.{{$value}}" class="form-control" >
                                        </td>
                                        <td>
                                            <a href="funding_evidence.{{$key}}" target="_blank" class="btn btn-info">Download</a>
                                        </td> 
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <h4 class="card-title mx-2">Attachements</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group row">
                            <label for="physical_structure_plan" class="col-sm-6">Organogramme:</label>
                            <a href="{{$authorisation->interimAuthorisation->organogramme}}" target="_blank" class="col-sm-6 btn btn-info">Download</a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group row">
                            <label for="physical_structure_plan" class="col-sm-6">Physical Structure Plan:</label>
                            <a href="{{$authorisation->interimAuthorisation->physical_structure_plan}}" target="_blank" class="col-sm-6 btn btn-info">Download</a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group row">
                            <label for="physical_structure_plan" class="col-sm-6">Five Year Strategic Plan:</label>
                            <a href="{{$authorisation->interimAuthorisation->five_year_strategic_plan}}" target="_blank" class="col-sm-6 btn btn-info">Download</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
     </div>
</div>
