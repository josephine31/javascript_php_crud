<?php
    require 'layouts/header.php';
?> 
<main role="main" class="flex-shrink-0">
    <div class="container">
        <h1><?php echo $title?> Employee</h1>
        <form action="<?php echo SITE_URL.'/controller/employee_store.php'; ?>" method="POST" id="employee_form">
            <input type="hidden" name="emp_id" value="<?php echo (isset($employee_result['Empid'])) ?  $employee_result['Empid']: '' ?>">
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First name" value="<?php echo (isset($employee_result['First_name'])) ?  $employee_result['First_name']: '' ?>">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="middle_name">Middle Name</label>
                        <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Middle name" value="<?php echo (isset($employee_result['Middle_name'])) ?  $employee_result['Middle_name']: '' ?>">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last name" value="<?php echo (isset($employee_result['Last_name'])) ?  $employee_result['Last_name']: '' ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="dob">Date of Birth</label>
                        <input type="text" class="form-control" id="dob" name="dob" readonly value="<?php echo (isset($employee_result['DOB'])) ?  date('d-m-Y',strtotime($employee_result['DOB'])): '' ?>">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <br>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="male" name="gender" class="custom-control-input" value="M" <?php echo (isset($employee_result['Gender']) && $employee_result['Gender'] == 'M') ? 'checked' : '' ?>>
                            <label class="custom-control-label" for="male">Male</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="female" name="gender" class="custom-control-input" value="F" <?php echo (isset($employee_result['Gender']) && $employee_result['Gender'] == 'F') ? 'checked' : '' ?>>
                            <label class="custom-control-label" for="female">Female</label>
                        </div>
                        <br>
                        <span id="gender_error"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="basic">Basic</label>
                        <input type="text" class="form-control" maxlength="10" id="basic" name="basic" placeholder="Basic" value="<?php echo (isset($employee_result['Basic'])) ?  $employee_result['Basic']: '' ?>">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="allowance">Allowance</label>
                        <input type="text" class="form-control" maxlength="10" id="allowance" name="allowance" placeholder="Allowance" value="<?php echo (isset($employee_result['Allowance'])) ?  $employee_result['Allowance']: '' ?>">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="deduction">Deduction</label>
                        <input type="text" class="form-control" maxlength="10" id="deduction" name="deduction" placeholder="Deduction" value="<?php echo (isset($employee_result['Deduction'])) ?  $employee_result['Deduction']: '' ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="net_salary">Net Salary</label>
                        <input type="text" class="form-control" id="net_salary" name="net_salary" placeholder="Rs. 0" readonly value="<?php echo (isset($employee_result['Net_sal'])) ?  'Rs. '.$employee_result['Net_sal']: '' ?>">
                    </div>
                </div>
            </div>
            <button class="btn btn-light"><a href="./employee_list.php">Back</a></button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</main>

<?php
    require 'layouts/footer.php';
?>
      
