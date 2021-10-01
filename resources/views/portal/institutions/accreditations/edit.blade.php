@extends('layouts.portal')
@section('title','Edit Programme Accreditation')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="card-title">Edit Programme Accreditation Application</h4>
                        </div>
                        <div class="col-sm-6 d-flex justify-content-end">
                            <a href="{{route('portal.institution.accreditation.index')}}" class="btn btn-success btn-square mr-1"><i class="fas fa-list"></i> Accreditation Applications</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('portal.institution.accreditation.update',$application->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="name">Programme title: <sup class="text-danger">*</sup></label>
                            <input type="text" id="programme_title" name="programme_title" class="form-control" value="{{$application->programmeDetail->programme_title}}" required>
                            @error('programme_title')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="level">Level of Programme: <sup class="text-danger">*</sup></label>
                            <select name="level" id="level" class="form-control custom-select" required>
                                <option value="">Select level</option>
                                @foreach ($qualification_levels as $id => $level)
                                    <option value="{{$level}}" {{$application->programmeDetail->level == $level ? 'selected' : ''}}>{{$level}}</option>
                                @endforeach
                            </select>
                            @error('level')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="physical_address">Name of Mentoring Institution: <sup class="text-danger">*</sup></label>
                            <input type="text" id="mentoring_institution" name="mentoring_institution" class="form-control" value="{{$application->programmeDetail->mentoring_institution}}" required>
                            @error('mentoring_institution')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="postal_address">Mentoring Institution Address:</label>
                            <input type="text" id="mentoring_institution_address" name="mentoring_institution_address" class="form-control" value="{{$application->programmeDetail->mentoring_institution_address}}">
                            @error('mentoring_institution_address')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="physical_address">Proof of programme affiliation to mentoring institution: <sup class="text-danger">*</sup></label>
                            <input type="file" id="programme_affiliation_proof" name="programme_affiliation_proof" class="form-control">
                            @error('programme_affiliation_proof')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="programme_aims">Aims: <sup class="text-danger">*</sup></label>
                            <textarea class="form-control" id="programme_aims" name="programme_aims" rows="4" placeholder="Programme Aims..">{{$application->programmeDetail->programme_aims}}</textarea>
                            @error('programme_aims')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="programme_objectives">Objectives: <sup class="text-danger">*</sup></label>
                            <textarea class="form-control" id="programme_objectives" name="programme_objectives" rows="4" placeholder="Programme objectives..">{{$application->programmeDetail->programme_objectives}}</textarea>
                            @error('programme_objectives')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="physical_address">Proof of support of the programme: <sup class="text-danger">*</sup></label>
                            <input type="file" id="programme_support_proof" name="programme_support_proof" class="form-control">
                            @error('programme_support_proof')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="physical_address">Student Admission Requirements: <sup class="text-danger">*</sup></label>
                            <input type="text" id="admission_requirements" name="admission_requirements" class="form-control" value="{{$application->programmeDetail->admission_requirements}}" required>
                            @error('admission_requirements')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="postal_address">Requirements for progression:</label>
                            <input type="text" id="progrssion_requirements" name="progrssion_requirements" class="form-control" value="{{$application->programmeDetail->progression_requirements}}">
                            @error('progrssion_requirements')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="learning_outcomes">Student Learning outcomes: <sup class="text-danger">*</sup></label>
                            <textarea class="form-control" id="learning_outcomes" name="learning_outcomes" rows="4" placeholder="Briefly explain the student learning outcomes..">{{$application->programmeDetail->learning_outcomes}}</textarea>
                            @error('learning_outcomes')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="studentship_duration">Duration of studentship for the programme: <sup class="text-danger">*</sup></label>
                            <input type="text" id="studentship_duration" name="studentship_duration" class="form-control" value="{{$application->programmeDetail->studentship_duration}}" required>
                            @error('studentship_duration')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="total_qualification_time">Total Qualification time (in Hours):</label>
                            <input type="text" id="total_qualification_time" name="total_qualification_time" class="form-control" value="{{$application->programmeDetail->total_qualification_time}}">
                            @error('total_qualification_time')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="level_of_fees">Level of Fees (Dalasis): <sup class="text-danger">*</sup></label>
                            <input type="number" id="level_of_fees" name="level_of_fees" class="form-control" value="{{$application->programmeDetail->level_of_fees}}" min="0" step="1" required>
                            @error('level_of_fees')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="department_name">Name of Department: <sup class="text-danger">*</sup></label>
                            <input type="text" id="department_name" name="department_name" class="form-control" value="{{$application->programmeDetail->department_name}}" required>
                            @error('department_name')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="department_establishment_date">Department Establishment Date: <sup class="text-danger">*</sup></label>
                            <input class="form-control" id="date-input" type="date" name="department_establishment_date" value="{{$application->programmeDetail->department_establishment_date}}"><span class="help-block">Please enter a valid date</span>
                            @error('department_establishment_date')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Head of Department(s)</h4>
                                    <table class="table table-responsive-sm" id="department_heads_table">
                                        <thead>
                                          <tr>
                                            <th>Name</th>
                                            <th>Rank</th>
                                            <th>Highest Qualification</th>
                                            <th>Other Qualification</th>
                                            <th>Years of releveant post-qualification experience</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($application->programmeDetail->departmentHeads as $head)
                                            <tr id="departmentheads{{$loop->index}}">
                                                <td>
                                                    <input type="text" name="department_head_names[]" value="{{$head->name}}" class="form-control" required>
                                                    @error('department_head_names')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input type="text" name="department_head_ranks[]" value="{{$head->rank}}" class="form-control" required>
                                                    @error('department_head_ranks')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <select name="department_head_qualifications[]" class="form-control custom-select">
                                                        <option value="">--- select qualification ---</option>
                                                        @foreach ($qualification_levels as $id => $qualification)
                                                            <option value="{{$qualification}}" {{$head->highest_qualifications ==  $qualification ? 'selected' : ''}}>{{$qualification}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('department_head_qualifications')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <select name="department_head_other_qualifications[]" class="form-control custom-select">
                                                        <option value="">--- select other qualifications ---</option>
                                                        @foreach ($qualification_levels as $id => $qualification)
                                                            <option value="{{$qualification}}" {{$head->other_qualifications ==  $qualification ? 'selected' : ''}}>{{$qualification}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('department_head_other_qualifications')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input type="text" name="department_head_experience[]" value="{{$head->relevant_post_qualification_experience}}" class="form-control" required>
                                                    @error('department_head_experience')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </td>
                                                <td><input type="hidden" name="departmenthead_ids[]" value="{{$head->id}}"/></td>
                                              </tr> 
                                            @endforeach
                                          {{-- <tr id="departmentheads1"></tr> --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button id="add_department_head" class="btn btn-primary pull-left">+ Add Department head</button>
                            <button id='delete_department_head' class="float-right btn btn-danger">- Delete Department head</button>
                        </div>
                    </div>
                    <hr>
                    <h4 class="card-title mx-2">Curriculum Activities</h4>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="curriculum_design_process">Process of Curriculum Design: <sup class="text-danger">*</sup></label>
                            <textarea class="form-control" id="curriculum_design_process" name="curriculum_design_process"
                             rows="4" placeholder="Briefly explain the curriculum design process..">
                                {{$application->programmeDetail->curriculum_design_process}}
                            </textarea>
                            @error('curriculum_design_process')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="curriculum_update">Updating Curriculum: <sup class="text-danger">*</sup></label>
                            <textarea class="form-control" id="curriculum_update" name="curriculum_update" 
                            rows="4" placeholder="Briefly explain the provision of updating the curriculum of each programme offered..">
                                {{$application->programmeDetail->curriculum_update}}
                            </textarea>
                            @error('curriculum_update')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="programme_structure">Programme structure: <sup class="text-danger">*</sup></label>
                            <input type="file" id="programme_structure" name="programme_structure" class="form-control">
                            @error('programme_structure')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="students_assessment_mode">Mode of Assessment of Students: <sup class="text-danger">*</sup></label>
                            <textarea class="form-control" id="students_assessment_mode" name="students_assessment_mode"
                             rows="4" placeholder="Briefly describe how students are assessed and the grading system used..">
                                {{$application->programmeDetail->students_assessment_mode}}
                            </textarea>
                            @error('students_assessment_mode')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="certification_mode">Mode of Certification: <sup class="text-danger">*</sup></label>
                            <textarea class="form-control" id="certification_mode" name="certification_mode" rows="4" 
                            placeholder="Briefly describe the mode of certification and the requirements for graduation in the programme. Also explain how
                            repeats in final examination are handled..">
                                {{$application->programmeDetail->certification_mode}}
                            </textarea>
                            @error('certification_mode')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="external_examiners_appointment_evidence">Evidence of appointment of external examiners: <sup class="text-danger">*</sup></label>
                            <textarea class="form-control" id="external_examiners_appointment_evidence" name="external_examiners_appointment_evidence" rows="5" 
                             placeholder="Briefly describe the appointment process of external examiners..">
                                {{$application->programmeDetail->external_examiners_appointment_evidence}}
                            </textarea>
                            @error('external_examiners_appointment_evidence')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="staff_recruitment_policy">Staff recruitment,promotion,retention,termination,welfare and dismissal policy: <sup class="text-danger">*</sup></label>
                            <textarea class="form-control" id="staff_recruitment_policy" name="staff_recruitment_policy" rows="5" 
                             placeholder="Briefly describe the appointment process of external examiners..">
                                {{$application->programmeDetail->staff_recruitment_policy}}
                            </textarea>
                            @error('staff_recruitment_policy')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="provisions_for_disability">Provisions made for physicall challenged staff/students: <sup class="text-danger">*</sup></label>
                            <textarea class="form-control" id="provisions_for_disability" name="provisions_for_disability"
                             rows="4" placeholder="Briefly describe how students are assessed and the grading system used..">
                                {{$application->programmeDetail->provisions_for_disability}}
                            </textarea>
                            @error('provisions_for_disability')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="provided_safety_facilities">Safety facilities provided: <sup class="text-danger">*</sup></label>
                            <textarea class="form-control" id="provided_safety_facilities" name="provided_safety_facilities" rows="4" 
                            placeholder="Briefly describe the mode of certification and the requirements for graduation in the programme. Also explain how
                            repeats in final examination are handled..">
                                {{$application->programmeDetail->provided_safety_facilities}}
                            </textarea>
                            @error('provided_safety_facilities')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 d-flex justify-content-center">
                            <button type="submit" id="submit" class="btn btn-success btn-square btn-lg">Submit Applicaton</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // let signatory_row_number = 1;
        // let departmenthead_row_number = 1;
        $("#add_department_head").click(function(e){
            e.preventDefault();
            let departmentheadCount = $("#department_heads_table tbody tr").length;
            let row = `<tr id="departmentheads${departmentheadCount+1}" class="departmenthead-row">`+
                        '<td>'+
                            '<input type="text" name="department_head_names[]" class="form-control" required>'+
                            '@error("department_head_names")'+
                                '<span class="text-danger mt-1">{{$message}}</span>'+
                            ' @enderror'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" name="department_head_ranks[]" class="form-control" required>'+
                            '@error("department_head_ranks")'+
                                '<span class="text-danger mt-1">{{$message}}</span>'+
                            '@enderror'+
                        '</td>'+
                        '<td>'+
                            '<select name="department_head_qualifications[]" class="form-control custom-select">'+
                                '<option value="">--- select qualification ---</option>'+
                                '@foreach ($qualification_levels as $id => $qualification)'+
                                    '<option value="{{$qualification}}">{{$qualification}}</option>'+
                                '@endforeach'+
                            '</select>'+
                            '@error("department_head_qualifications")'+
                                '<span class="text-danger mt-1">{{$message}}</span>'+
                            '@enderror'+
                        '</td>'+
                        '<td>'+
                            '<select name="department_head_other_qualifications[]" class="form-control custom-select">'+
                                '<option value="">--- select other qualifications ---</option>'+
                                '@foreach ($qualification_levels as $id => $qualification)'+
                                    '<option value="{{$qualification}}">{{$qualification}}</option>'+
                                '@endforeach'+
                            '</select>'+
                            '@error("department_head_other_qualifications")'+
                                '<span class="text-danger mt-1">{{$message}}</span>'+
                            '@enderror'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" name="department_head_experience[]" class="form-control" required>'+
                            '@error("department_head_experience")'+
                                '<span class="text-danger mt-1">{{$message}}</span>'+
                            '@enderror'+
                        '</td>'+
                        '<td><input type="hidden" name="departmenthead_ids[]" value=""/></td>'+
                        '</tr>'; 

                $('#department_heads_table tbody').append(row);
        });

        $("#delete_department_head").click(function(e){
            e.preventDefault();
            let rowCount = $("#department_heads_table tbody tr").length;
            let departmentheadrows = $("#department_heads_table tbody .departmenthead-row").length;

            if(departmentheadrows > 0){
                $("#departmentheads" + rowCount).remove();
            }
        });
    </script>
@endsection