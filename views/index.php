<?php
    require 'layouts/header.php';
?>
    <main role="main" class="flex-shrink-0">
        <div class="container">
            <?php if (!empty($_SESSION["mssg"])){ ?>
            <div class="alert alert-success">
                    <strong><?php echo $_SESSION["mssg"]; ?> </strong> 
            </div>
            <?php } ?>
            <h1>List of User</h1>
            <a href="<?php echo SITE_URL.'/controller/employee_create.php'; ?>" class="btn btn-success mb-3" style="float:right"><i class="fa fa-plus"></i> Add Employee</a>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th style="text-align: center;" scope="col">#</th>
                        <th style="text-align: center;" scope="col">First Name</th>
                        <th style="text-align: center;" scope="col">Middle Name</th>
                        <th style="text-align: center;" scope="col">Last Name</th>
                        <th style="text-align: center;" scope="col">DOB</th>
                        <th style="text-align: center;" scope="col">Gender</th>
                        <th style="text-align: center;" scope="col">Net Salary</th>
                        <th style="text-align: center;" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if(count($employees)>0){
                        foreach($employees as $key => $employee){ ?>
                        <tr>
                            <th style="text-align: center;" scope="row"><?php echo ($key+1); ?></th>
                            <td style="text-align: center;"><?php echo $employee['First_name']; ?></td>
                            <td style="text-align: center;"><?php echo $employee['Middle_name']; ?></td>
                            <td style="text-align: center;"><?php echo $employee['Last_name']; ?></td>
                            <td style="text-align: center;"><?php echo date("d-m-Y", strtotime($employee['DOB'])); ?></td>
                            <td style="text-align: center;"><?php echo $employee['Gender']; ?></td>
                            <td style="text-align: center;"><?php echo 'Rs. '.$employee['Net_sal']; ?></td>
                            <td style="text-align: center;">
                                <a href="<?php echo SITE_URL.'/controller/employee_view.php?emp_id='.$employee['Empid']; ?>"><button class="btn btn-primary btn-sm">View</button></a>
                                <a href="<?php echo SITE_URL.'/controller/employee_edit.php?emp_id='.$employee['Empid']; ?>"><button class="btn btn-outline-primary btn-sm">Edit</button></a>
                                <a href="<?php echo SITE_URL.'/controller/employee_delete.php?emp_id='.$employee['Empid']; ?>"><button class="btn btn-outline-danger btn-sm" onclick="deleted()">Delete</button></a>
                            </td>
                        </tr>
                        <script>
                            function deleted() {
                                confirm("Are you sure,Your data will be deleted!");
                                }
                    </script>
                    <?php
                     } } else { ?>
                        <tr>
                            <td style="text-align: center;" colspan="8"> No Data Available</td>
                        </tr>
                   <?php } ?>
                </tbody>
            </table>
        </div>
    </main>

<?php
    require 'layouts/footer.php';
?>