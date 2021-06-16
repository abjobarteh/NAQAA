@extends('layouts.portal')
@section('title','New Registration')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="card-title">New Registration Application</h4>
                        </div>
                        <div class="col-sm-6 d-flex justify-content-end">
                            <a href="{{route('portal.institution.registration.index')}}" class="btn btn-success btn-square mr-1"><i class="fas fa-list"></i> Applications</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('portal.institution.registration.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h4 class="card-title">Institutional Data</h4>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="name">Name of Training Provider: <sup class="text-danger">*</sup></label>
                            <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}" required>
                            @error('name')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="category_id">Classification of Institution: <sup class="text-danger">*</sup></label>
                            <select name="classification_id" id="classification_id" class="form-control custom-select">
                                <option value="">--- select classification</option>
                                @foreach ($classifications as $id => $classification)
                                    <option value="{{$id}}" {{old('classification_id') == $id ? 'selected' :''}}>{{$classification}}</option>
                                @endforeach
                            </select>
                            @error('classification_id')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="address">Physical Address (Admin Site): <sup class="text-danger">*</sup></label>
                            <input type="text" id="address" name="address" class="form-control" value="{{old('address')}}" required>
                            @error('address')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="postal_address">Postal Address:</label>
                            <input type="text" id="po_box" name="po_box" class="form-control" value="{{old('po_box')}}">
                            @error('po_box')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="telephone_work">Telephone (Work): <sup class="text-danger">*</sup></label>
                            <input type="number" id="telephone_work" name="telephone_work" class="form-control" value="{{old('telephone_work')}}" min="0" step="1" required>
                            @error('telephone_work')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="mobile_phone">Mobile Phone: <sup class="text-danger">*</sup></label>
                            <input type="number" id="mobile_phone" name="mobile_phone" class="form-control" value="{{old('mobile_phone')}}" min="0" step="1" required>
                            @error('mobile_phone')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="fax">Fax:</label>
                            <input type="number" id="fax" name="fax" class="form-control" value="{{old('fax')}}" min="0" step="1">
                            @error('fax')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="email">Email: <sup class="text-danger">*</sup></label>
                            <input type="email" id="email" name="email" class="form-control" value="{{old('email')}}" required>
                            @error('email')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="website">Website:</label>
                            <input type="text" id="website" name="website" class="form-control" value="{{old('website')}}">
                            @error('website')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="region_id">Region: <sup class="text-danger">*</sup></label>
                            <select name="region_id" id="region_id" class="form-control select2" required>
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
                            <select name="district_id" id="district_id" class="form-control select2" required>
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
                            <select name="town_village_id" id="town_village_id" class="form-control select2">
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
                    <h4 class="card-title mx-2">Details of Current Center Manager/Principal/Director</h4>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="firstname">Firstname: <sup class="text-danger">*</sup></label>
                            <input type="text" id="firstname" name="firstname" class="form-control" value="{{old('firstname')}}" required>
                            @error('firstname')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="middlename">Middlename: <sup class="text-danger">*</sup></label>
                            <input type="text" id="middlename" name="middlename" class="form-control" value="{{old('middlename')}}" required>
                            @error('middlename')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="lastname">Lastname:</label>
                            <input type="text" id="lastname" name="lastname" class="form-control" value="{{old('lastname')}}">
                            @error('lastname')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="gender">Gender: <sup class="text-danger">*</sup></label>
                            <select name="gender" id="gender" class="form-control custom-select">
                                <option value="">--- select gender ---</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            @error('gender')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="date_of_birth">Date of Birth: <sup class="text-danger">*</sup></label>
                            <input class="form-control" id="date-input" type="date" name="date_of_birth" value="{{old('date_of_birth')}}"><span class="help-block">Please enter a valid date</span>
                            @error('date_of_birth')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="nationality">Nationality: <sup class="text-danger">*</sup></label>
                            <select name="nationality" id="nationality" class="form-control select2" required>
                                <option value="">Select nationaltiy</option>
                                @foreach ($countries as $country)
                                    <option value="{{$country}}" {{$country === 'Gambia' || old('nationality') === 'Gambia' ? 'selected' : ''}} {{$country === old('nationality') ? 'selected' : ''}}>{{$country}}</option>
                                @endforeach
                            </select>
                            @error('nationality')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="qualifications">Qualification(s): <sup class="text-danger">*</sup></label>
                            <select name="qualifications" id="qualifications" class="form-control custom-select">
                                <option value="">--- select qualification(s) ---</option>
                                @foreach ($qualification_levels as $id => $qualification)
                                    <option value="{{$qualification}}" {{ old('qualifications') === $qualification ? 'selected' : ''}} >{{$qualification}}</option>
                                @endforeach
                            </select>
                            @error('qualifications')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="relevant_experience">Relevant Experience: <sup class="text-danger">*</sup></label>
                            <textarea class="form-control" id="relevant_experience" name="relevant_experience" rows="4" placeholder="Relevant Experience.."></textarea>
                            @error('relevant_experience')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <h4 class="card-title mx-2">Bank Details</h4>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="bank_names">Bank Name(s): <sup class="text-danger">*</sup></label>
                            <input type="text" id="bank_names" name="bank_names" class="form-control" placeholder="Enter Bank name(s) seperated by commas ex: GTB, Ecobank" required>
                            @error('bank_names')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Signatories to  the accounts</h4>
                                    <span class="text-info text-bold"><i class="fas fa-exclamation-triangle text-warning"></i> At least three(3) persons and one must be Gambian</span>
                                    <table class="table table-responsive-sm" id="bank_signatories_table">
                                        <thead>
                                          <tr>
                                            <th>Fullname</th>
                                            <th>Position</th>
                                            <th>Signature</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr id="signatories0">
                                            <td>
                                                <input type="text" name="signatories_names[]" class="form-control" required>
                                                @error('signatories_names')
                                                    <span class="text-danger mt-1">{{$message}}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" name="signatories_postitions[]" class="form-control" required>
                                                @error('signatories_postitions')
                                                    <span class="text-danger mt-1">{{$message}}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" name="signatories_signature[]" class="form-control" required>
                                                @error('signatories_signature')
                                                    <span class="text-danger mt-1">{{$message}}</span>
                                                @enderror
                                            </td>
                                          </tr>
                                          <tr id="signatories1"></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button id="add_signatory" class="btn btn-primary pull-left">+ Add Signatory</button>
                            <button id='delete_signatory' class="float-right btn btn-danger">- Delete Signatory</button>
                        </div>
                    </div>
                    <hr>
                    <h4 class="card-title mx-2">Board of Directors/Management Committee</h4>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <span class="text-info text-bold"><i class="fas fa-exclamation-circle text-warning"></i> Please note secretary to the board of Director must be Gambian</span>
                                    <table class="table table-responsive-sm" id="board_of_directors_table">
                                        <thead>
                                          <tr>
                                            <th>Name</th>
                                            <th>Nationality</th>
                                            <th>Work experience</th>
                                            <th>Position in Board</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr id="boardmemeber0">
                                            <td>
                                                <input type="text" id="boardmember_names" name="boardmember_names[]" class="form-control" required>
                                                @error('boardmember_names')
                                                    <span class="text-danger mt-1">{{$message}}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <select name="boardmember_nationalities[]" class="form-control custom-select">
                                                    <option value="">--- select nationality ---</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{$country}}" {{$country === old('boardmember_nationalities') ? 'selected' : ''}}>{{$country}}</option>
                                                    @endforeach
                                                </select>
                                                @error('boardmember_nationalities')
                                                    <span class="text-danger mt-1">{{$message}}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" name="boardmember_experience[]" class="form-control" required>
                                                @error('boardmember_experience')
                                                    <span class="text-danger mt-1">{{$message}}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" name="boardmember_positions[]" class="form-control" required>
                                                @error('boardmember_positions')
                                                    <span class="text-danger mt-1">{{$message}}</span>
                                                @enderror
                                            </td>
                                          </tr>
                                          <tr id="boardmemeber1"></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button id="add_boardmember" class="btn btn-primary pull-left">+ Add Boardmember</button>
                            <button id='delete_boardmember' class="float-right btn btn-danger">- Delete Boardmember</button>
                        </div>
                    </div>
                    <hr>
                    <h4 class="card-title mx-2">Training Provider Checklists</h4>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="registration_license">Registration License</label>
                        <div class="col-md-9">
                          <input id="registration_license" type="file" name="registration_license">
                          @error('registration_license')
                            <span class="text-danger mt-1">{{$message}}</span>
                          @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="organisational_chart">Organisational chart</label>
                        <div class="col-md-9">
                          <input id="organisational_chart" type="file" name="organisational_chart">
                          @error('organisational_chart')
                            <span class="text-danger mt-1">{{$message}}</span>
                          @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="financial_policy">Financial Policy</label>
                        <div class="col-md-9">
                          <input id="financial_policy" type="file" name="financial_policy">
                          @error('financial_policy')
                            <span class="text-danger mt-1">{{$message}}</span>
                          @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="audited_accounts">Audited accounts</label>
                        <div class="col-md-9">
                          <input id="audited_accounts" type="file" name="audited_accounts">
                          @error('audited_accounts')
                            <span class="text-danger mt-1">{{$message}}</span>
                          @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="staff_socialsecurity_receipt">Receipts of staff contribution  to social security</label>
                        <div class="col-md-9">
                          <input id="staff_socialsecurity_receipt" type="file" name="staff_socialsecurity_receipt">
                          @error('staff_socialsecurity_receipt')
                            <span class="text-danger mt-1">{{$message}}</span>
                          @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="institutional_tin">Institutional TIN</label>
                        <div class="col-md-9">
                          <input id="institutional_tin" type="file" name="institutional_tin">
                          @error('institutional_tin')
                            <span class="text-danger mt-1">{{$message}}</span>
                          @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="health_inspectors_certificate">Health Inspectors Certificate</label>
                        <div class="col-md-9">
                          <input id="health_inspectors_certificate" type="file" name="health_inspectors_certificate">
                          @error('health_inspectors_certificate')
                            <span class="text-danger mt-1">{{$message}}</span>
                          @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="budget_estimate">Budget Estimate</label>
                        <div class="col-md-9">
                          <input id="budget_estimate" type="file" name="budget_estimate">
                          @error('budget_estimate')
                            <span class="text-danger mt-1">{{$message}}</span>
                          @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="last_three_month_account_statement">Last three months statement of account</label>
                        <div class="col-md-9">
                          <input id="last_three_month_account_statement" type="file" name="last_three_month_account_statement">
                          @error('last_three_month_account_statement')
                            <span class="text-danger mt-1">{{$message}}</span>
                          @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="fees_policy">Fees Policy</label>
                        <div class="col-md-9">
                          <input id="fees_policy" type="file" name="fees_policy">
                          @error('fees_policy')
                            <span class="text-danger mt-1">{{$message}}</span>
                          @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="student_code_of_conduct">Student Code of Conduct</label>
                        <div class="col-md-9">
                          <input id="student_code_of_conduct" type="file" name="student_code_of_conduct">
                          @error('student_code_of_conduct')
                            <span class="text-danger mt-1">{{$message}}</span>
                          @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="sample_student_record">Sample of Student Record</label>
                        <div class="col-md-9">
                          <input id="sample_student_record" type="file" name="sample_student_record">
                          @error('sample_student_record')
                            <span class="text-danger mt-1">{{$message}}</span>
                          @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="student_feedback">Student Feedback</label>
                        <div class="col-md-9">
                          <input id="student_feedback" type="file" name="student_feedback">
                          @error('student_feedback')
                            <span class="text-danger mt-1">{{$message}}</span>
                          @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="staff_policy">Staff Policy</label>
                        <div class="col-md-9">
                          <input id="staff_policy" type="file" name="staff_policy">
                          @error('staff_policy')
                            <span class="text-danger mt-1">{{$message}}</span>
                          @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="job_descriptions">Job Descriptions</label>
                        <div class="col-md-9">
                          <input id="job_descriptions" type="file" name="job_descriptions">
                          @error('job_descriptions')
                            <span class="text-danger mt-1">{{$message}}</span>
                          @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="staff_meeting_minutes">Staff Meeting Minutes</label>
                        <div class="col-md-9">
                          <input id="staff_meeting_minutes" type="file" name="staff_meeting_minutes">
                          @error('staff_meeting_minutes')
                            <span class="text-danger mt-1">{{$message}}</span>
                          @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="board_meeting_minutes">Board Meeting Minutes</label>
                        <div class="col-md-9">
                          <input id="board_meeting_minutes" type="file" name="board_meeting_minutes">
                          @error('board_meeting_minutes')
                            <span class="text-danger mt-1">{{$message}}</span>
                          @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="quality_management_systems">Quality Management systems</label>
                        <div class="col-md-9">
                          <input id="quality_management_systems" type="file" name="quality_management_systems">
                          @error('quality_management_systems')
                            <span class="text-danger mt-1">{{$message}}</span>
                          @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="self_evaluation_instruments">Self Evaluation Instruments</label>
                        <div class="col-md-9">
                          <input id="self_evaluation_instruments" type="file" name="self_evaluation_instruments">
                          @error('self_evaluation_instruments')
                            <span class="text-danger mt-1">{{$message}}</span>
                          @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="performance_indicators">Performance Indicators</label>
                        <div class="col-md-9">
                          <input id="performance_indicators" type="file" name="performance_indicators">
                          @error('performance_indicators')
                            <span class="text-danger mt-1">{{$message}}</span>
                          @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="trainer_lists">List of Trainers with their Registration Numbers</label>
                        <div class="col-md-9">
                          <input id="trainer_lists" type="file" name="trainer_lists">
                          @error('trainer_lists')
                            <span class="text-danger mt-1">{{$message}}</span>
                          @enderror
                        </div>
                    </div>
                    <hr>
                    <h4 class="card-title mx-2">Declaration</h4>
                    <div class="col-md-12 col-form-label">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input mr-3" id="inline-checkbox1" name="declaration" type="checkbox" value="check1">
                          <label class="form-check-label text-lg" for="inline-checkbox1">
                                We the undersigned declare that: <br> 
                                i. information contained in this application is, to the best of our knowledge true and 
                                accurate. <br>
                                ii. our establishment has sufficient finance to cover its operations.
                          </label>
                            @error('declaration')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 d-flex justify-content-center">
                            <button type="button" id="save" class="btn btn-info btn-square btn-block mr-1">Save</button>
                            <button type="submit" id="submit" class="btn btn-success btn-square btn-block">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
            let signatory_row_number = 1;
            let boardmember_row_number = 1;
            $("#add_signatory").click(function(e){
                e.preventDefault();
                let new_row_number = signatory_row_number - 1;
                $('#signatories' + signatory_row_number).html($('#signatories' + new_row_number).html()).find('td:first-child');
                $('#bank_signatories_table').append('<tr id="signatories' + (signatory_row_number + 1) + '"></tr>');
                signatory_row_number++;
            });
            $("#add_boardmember").click(function(e){
                e.preventDefault();
                let new_row_number = boardmember_row_number - 1;
                $('#boardmemeber' + boardmember_row_number).html($('#boardmemeber' + new_row_number).html()).find('td:first-child');
                $('#board_of_directors_table').append('<tr id="boardmemeber' + (boardmember_row_number + 1) + '"></tr>');
                boardmember_row_number++;
            });

            $("#delete_signatory").click(function(e){
                e.preventDefault();
                if(signatory_row_number > 1){
                    $("#signatories" + (signatory_row_number - 1)).html('');
                    signatory_row_number--;
                }
            });
            $("#delete_boardmember").click(function(e){
                e.preventDefault();
                if(boardmember_row_number > 1){
                    $("#boardmemeber" + (boardmember_row_number - 1)).html('');
                    boardmember_row_number--;
                }
            });
    </script>
@endsection