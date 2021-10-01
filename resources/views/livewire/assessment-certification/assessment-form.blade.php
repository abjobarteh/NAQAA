<div>
    <div class="modal fade" id="assessment-modal" wire:ignore.self>
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><strong>{{$student_detail->full_name ?? 'Student'}}</strong> Assesment Details</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                  <div class="col-12">
                      <div class="form-group">
                          <label for="assessment_status">Assessment Status</label>
                          <select name="assessment_status" class="form-control custom-select" wire:model="assessment_status">
                            <option value="">-- select assessment status --</option>
                            <option value="competent">Competent</option>
                            <option value="notcompetent">Not Competent</option>
                            <option value="incomplete">Incomplete</option>
                        </select>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-12">
                      <div class="form-group">
                          <label for="qualification_type">Qualification type</label>
                          <select name="qualification_type" class="form-control custom-select" wire:model="qualification_type">
                            <option value="">-- select qualification type --</option>
                            <option value="full">Full</option>
                            <option value="partial">Partial</option>
                        </select>
                      </div>
                  </div>
              </div>
              @if($is_partial)
              <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="assessment_status">Unit Standards Completed</label>
                        <select name="assessment_status" class="form-control custom-select" multiple wire:model="assessment_status">
                          <option value="">-- select unit standards completed --</option>
                          @foreach ($unit_standards as $unit_standard)
                              <option value="{{$unit_standard->id}}">{{$unit_standard->unit_standard_title}}</option>
                          @endforeach
                      </select>
                    </div>
                </div>
              </div>
              @endif
              <div class="row">
                  <div class="col-12">
                      <div class="form-group">
                          <label for="last_assessment_date">Last assessment date</label>
                          <input type="date" name="last_assessment_date" class="form-control" placeholder="Last assessment date" wire:model="last_assessment_date" />
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-12">
                      <div class="form-group">
                          <label for="assessment_center">Assessment center</label>
                          <input type="text" name="assessment_center" class="form-control" placeholder="Enter assessment center" wire:model="assessment_center" />
                      </div>
                  </div>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" wire:click="closeAssessmentForm">Close</button>
              <button type="button" class="btn btn-flat btn-success" wire:click="saveStudentAssessment">Save assessment</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
</div>
