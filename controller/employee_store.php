<?php
session_start();
ini_set ('display_errors', 1);  
ini_set ('display_startup_errors', 1);  
error_reporting (E_ALL);

require '../config.php';
require '../functions.php';

// Define variables and initialize with empty values
$first_name = $last_name = $middle_name = "";
$dob = $gender = $basic = $allowance = $deduction = $net_salary =  "";

$first_name_err = $last_name_err = $middle_name_err = "";
$dob_err = $gender_err = $basic_err = $allowance_err = $deduction_err = $net_salary_err =  "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate First Name
    $first_name = trim($_POST["first_name"]);
    if(empty($first_name)){
        $first_name_err = "Please enter a First Name.";
    }

    // Validate Middle Name
    $middle_name = trim($_POST["middle_name"]);
    if(empty($middle_name)){
        $middle_name_err = "Please enter a Middle Name.";
    }

    // Validate Last Name
    $last_name = trim($_POST["last_name"]);
    if(empty($last_name)){
        $last_name_err = "Please enter a Last Name.";
    }

    // Validate DOB
    $dob = trim($_POST["dob"]);
    if(empty($dob)){
        $dob_err = "Please enter DOB.";
    }
    
    // Validate Gender
    $gender = trim($_POST["gender"]);
    if(empty($gender)){
        $gender_err = "Please enter Gender.";
    }

    // Validate Basic
    $basic = trim($_POST["basic"]);
    if(empty($basic)){
        $basic_err = "Please enter Basic.";
    } elseif(!ctype_digit($basic)){
        $basic_err = "Please enter a positive integer value.";
    }

    // Validate Allowance
    $allowance = trim($_POST["allowance"]);
    if(empty($allowance)){
        $allowance_err = "Please enter Allowance.";
    } elseif(!ctype_digit($allowance)){
        $allowance_err = "Please enter a positive integer value.";
    }

    // Validate Deduction
    $deduction = trim($_POST["deduction"]);
    if(empty($deduction)){
        $deduction_err = "Please enter Deduction.";
    } elseif(!ctype_digit($deduction)){
        $salary_err = "Please enter a positive integer value.";
    }
    
    // Validate Net Salary
    $net_salary = trim($_POST["net_salary"]);
    $net_salary = (int) str_replace("Rs. ","",$net_salary);
    if(empty($net_salary)){
        $net_salary_err = "Please enter Net Salary.";
    } elseif(!ctype_digit($net_salary)){
        $salary_err = "Please enter a positive integer value.";
    }

    $emp_id = trim($_POST["emp_id"]);
    
    // Check input errors before inserting in database
    if(empty($first_name_err) && empty($middle_name_err) && empty($last_name_err) 
    && empty($dob_err) && empty($gender_err) && empty($net_salary_err)
    && empty($basic_err) && empty($allowance_err) && empty($deduction_err)){

        $dob = date("Y-m-d", strtotime($dob));
        
        $connect = connect($database);

        if(empty($emp_id)){
            $mssg = 'Employee created successfully';
            $statment = $connect->prepare(
                "INSERT INTO EMP (First_name, Middle_name, Last_name, DOB, Gender, Basic, Allowance, Deduction, Net_sal) 
                VALUES ('$first_name', '$middle_name', '$last_name', '$dob', '$gender', '$basic', '$allowance', '$deduction', '$net_salary')"
                );
        }else{
            $mssg = 'Employee updated successfully';
            $statment = $connect->prepare(
                "UPDATE EMP 
                 SET First_name = '$first_name',
                     Middle_name = '$middle_name',
                     Last_name = '$last_name',
                     DOB = '$dob',
                     Gender = '$gender', 
                     Basic = '$basic',
                     Allowance = '$allowance',
                     Deduction = '$deduction',
                     Net_sal = '$net_salary'
                WHERE Empid = '$emp_id'");
        }
         
        if($statment->execute()){

            $_SESSION["mssg"] = $mssg;
            header("location: ". SITE_URL . '/controller/employee_list.php');
        }else{
            var_dump($connect);
            echo "Oops! Something went wrong. Please try again later.";
        }
         
    }else{
        header("location: ". SITE_URL . '/controller/employee_create.php');;
    }
    
}
?>
 