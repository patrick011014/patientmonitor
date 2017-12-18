<style type="text/css">
  .padding-lr-1
  {
    padding-right: 0;
  }
</style>


<form class="global-submit">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Create Employee</h4>
    </div>
    <div class="modal-body">
      <div class="row clearfix">
        <div class="col-md-6">
          <div class="col-md-4 padding-lr-1">
            <div class="form-group">
               <small for="employee_first_name">First Name</small>
               <input class="form-control" id="employee_first_name" type="text" name="employee_first_name" >        
            </div>
          </div>
          <div class="col-md-4 padding-lr-1">
            <div class="form-group">
               <small for="employee_middle_name">Middle Name</small>
               <input class="form-control" id="employee_middle_name" type="text" name="employee_middle_name" >        
            </div>
          </div>
          <div class="col-md-4 padding-lr-1">
            <div class="form-group">
               <small for="employee_last_name">Last Name</small>
               <input class="form-control" id="employee_last_name" type="text" name="employee_last_name" >        
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="col-md-4 padding-lr-1">
            <div class="form-group">
               <small for="employee_number">Employee Number</small>
               <input class="form-control" id="employee_number" type="text" name="employee_number" >        
            </div>
          </div>
          <div class="col-md-4 padding-lr-1">
            <div class="form-group">
               <small for="employee_biometric_number">Biometric Number</small>
               <input class="form-control" id="employee_biometric_number" type="text" name="employee_biometric_number" >        
            </div>
          </div>
          <div class="col-md-4 padding-lr-1">
            <div class="form-group">
               <small for="employee_atm_number">ATM Number</small>
               <input class="form-control" id="employee_atm_number" type="text" name="employee_atm_number" >        
            </div>
          </div>
        </div>
      </div>

      <div class="row clearfix">
        
        <div class="col-md-6">
          <div class="col-md-4 padding-lr-1">
            <div class="form-group">
               <small for="datepicker">Birth Date</small>
               <input class="form-control" id="datepicker" type="text" name="employee_birthdate" >        
            </div>
          </div>
          <div class="col-md-4 padding-lr-1">
            <div class="form-group">
               <small for="employee_contact">Employee Contact</small>
               <input class="form-control" id="employee_contact" type="text" name="employee_contact" >        
            </div>
          </div>
          <div class="col-md-4 padding-lr-1">
            <div class="form-group">
               <small for="employee_email">Employee Email</small>
               <input class="form-control" id="employee_email" type="email" name="employee_email" >        
            </div>
          </div>
        </div>

        <div class="col-md-6">
          
        </div>
      </div>

      <div>
        <ul class="nav nav-tabs" style="margin-top: 40px;">
          <li class="active"><a data-toggle="tab" href="#Address">Address</a></li>
          <li><a data-toggle="tab" href="#company_details">Company Details</a></li>
          <li><a data-toggle="tab" href="#government">Government</a></li>
          <li><a data-toggle="tab" href="#shift">Shift</a></li>
        </ul>

        <div class="tab-content" style="padding-top: 10px;">
          <div id="Address" class="tab-pane fade in active">
            <div class="row clearfix">
              <div class="col-md-12">
                <div class="form-group">
                   <small for="employee_address">Employee Address</small>
                   <textarea class="form-control" id="employee_address" rows="3" name="employee_address" ></textarea>      
                </div>
              </div>
            </div>
            <div class="row clearfix">
                <div class="col-md-4">
                  <div class="form-group">
                     <small for="employee_state">Employee State</small>
                     <input class="form-control" id="employee_state" type="text" name="employee_state" >        
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                     <small for="employee_city">Employee City</small>
                     <input class="form-control" id="employee_city" type="text" name="employee_city" >        
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                     <small for="employee_street">Employee Street</small>
                     <input class="form-control" id="employee_street" type="text" name="employee_street" >        
                  </div>
                </div> 
            </div>          </div>
          <div id="company_details" class="tab-pane fade">
            <div class="row clearfix">
                <div class="col-md-6">
                  <div class="col-md-12">
                    <small for="employee_department">Select Department</small>
                    <select class="form-control" id="employee_department" name="employee_department" required>
                      <option value="">Select Employee</option>
                      <option value="">IT Department</option>
                      <option value="">HR Department</option>
                      <option value="">Account Department</option>
                    </select>
                  </div>
                  
                </div>
                <div class="col-md-6">
                  <div class="col-md-6">
                    <div class="form-group">
                       <small for="date_hired">Date Hired</small>
                       <input class="form-control" id="date_hired" type="text" name="employee_date_hired" >        
                    </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                         <small for="date_end">Date End</small>
                         <input class="form-control" id="date_end" type="text" name="employee_date_end" >        
                      </div>
                  </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-md-6">
                  <div class="col-md-12">
                    <small for="employee_job_title">Select Job Title</small>
                    <select class="form-control" id="employee_job_title" name="employee_job_title" required>
                      <option value="">Select Employee</option>
                      <option value="">IT Department</option>
                      <option value="">HR Department</option>
                      <option value="">Account Department</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="col-md-12">
                    <small for="employee_Status">Select Status</small>
                    <select class="form-control" id="employee_Status" name="employee_Status" required>
                      <option value="">Select Status</option>
                      <option value="">Regular</option>
                      <option value="">Trainee</option>
                      <option value="">Resigned</option>
                    </select>
                  </div>
                </div>
            </div>
          </div>
          <div id="government" class="tab-pane fade">
            <div class="row clearfix">
              <div class="col-md-6">
                <div class="form-group">
                   <small for="tin_number">Tin Number</small>
                   <input class="form-control" id="tin_number" type="text" name="employee_tin" >        
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                   <small for="sss_number">SSS Number</small>
                   <input class="form-control" id="sss_number" type="text" name="employee_sss" >        
                </div>
              </div>
            </div>
            <div class="row clearfix">
              <div class="col-md-6">
                <div class="form-group">
                   <small for="pagibig_number">Pagibig Number</small>
                   <input class="form-control" id="pagibig_number" type="text" name="employee_pagibig" >        
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                   <small for="philhealth_number">Philhealth Number</small>
                   <input class="form-control" id="philhealth_number" type="text" name="employee_philhealth" >        
                </div>
              </div>
            </div>
          </div>
          <div id="shift" class="tab-pane fade">
            <div class="row clearfix">
              <div class="col-md-12">
                <small for="shift_code">Select Shift</small>
                <select class="form-control" id="shift_code" name="shift_code_id" required>
                  <option value="">Select Shift</option>
                  <option value="">Day Shift</option>
                  <option value="">Night Shift</option>
                </select>
              </div>
            </div>
            <div class="row clearfix table-shift ">
              <div class="col-md-12">
                <table class="table table-striped table-hover table-bordered">
                  <thead>
                    <th class="text-center">Day</th>
                    <th class="text-center">Working Hours</th>
                    <th class="text-center">Time In</th>
                    <th class="text-center">Time Out</th>
                    <th class="text-center">Night Shift</th>
                    <th class="text-center">Rest Day</th>
                    <th class="text-center">Extra Day</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-center">SUN</td>
                      <td class="text-center">8.00</td>
                      <td class="text-center">9:00 PM</td>
                      <td class="text-center">3:00 AM</td>
                      <td class="text-center"><input type="checkbox" name=""></td>
                      <td class="text-center"><input type="checkbox" name=""></td>
                      <td class="text-center"><input type="checkbox" name=""></td>
                    </tr>
                    <tr>
                      <td class="text-center">MON</td>
                      <td class="text-center">8.00</td>
                      <td class="text-center">9:00 PM</td>
                      <td class="text-center">3:00 AM</td>
                      <td class="text-center"><input type="checkbox" name=""></td>
                      <td class="text-center"><input type="checkbox" name=""></td>
                      <td class="text-center"><input type="checkbox" name=""></td>
                    </tr>
                    <tr>
                      <td class="text-center">TUE</td>
                      <td class="text-center">8.00</td>
                      <td class="text-center">9:00 PM</td>
                      <td class="text-center">3:00 AM</td>
                      <td class="text-center"><input type="checkbox" name=""></td>
                      <td class="text-center"><input type="checkbox" name=""></td>
                      <td class="text-center"><input type="checkbox" name=""></td>
                    </tr>
                    <tr>
                      <td class="text-center">WEN</td>
                      <td class="text-center">8.00</td>
                      <td class="text-center">9:00 PM</td>
                      <td class="text-center">3:00 AM</td>
                      <td class="text-center"><input type="checkbox" name=""></td>
                      <td class="text-center"><input type="checkbox" name=""></td>
                      <td class="text-center"><input type="checkbox" name=""></td>
                    </tr>
                    <tr>
                      <td class="text-center">THU</td>
                      <td class="text-center">8.00</td>
                      <td class="text-center">9:00 PM</td>
                      <td class="text-center">3:00 AM</td>
                      <td class="text-center"><input type="checkbox" name=""></td>
                      <td class="text-center"><input type="checkbox" name=""></td>
                      <td class="text-center"><input type="checkbox" name=""></td>
                    </tr>
                    <tr>
                      <td class="text-center">FRI</td>
                      <td class="text-center">8.00</td>
                      <td class="text-center">9:00 PM</td>
                      <td class="text-center">3:00 AM</td>
                      <td class="text-center"><input type="checkbox" name=""></td>
                      <td class="text-center"><input type="checkbox" name=""></td>
                      <td class="text-center"><input type="checkbox" name=""></td>
                    </tr>
                    <tr>
                      <td class="text-center">SAT</td>
                      <td class="text-center">8.00</td>
                      <td class="text-center">9:00 PM</td>
                      <td class="text-center">3:00 AM</td>
                      <td class="text-center"><input type="checkbox" name=""></td>
                      <td class="text-center"><input type="checkbox" name=""></td>
                      <td class="text-center"><input type="checkbox" name=""></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
    </div>
  </div>
</form>

<script type="text/javascript">
  $(document).ready(function() {
    
      $("#datepicker").datepicker();
    
  });
</script>
