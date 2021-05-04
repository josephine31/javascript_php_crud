<?php
session_start();
require '../config.php';
require '../functions.php';

$title ='Edit';
if($_SERVER["REQUEST_METHOD"] == "GET"){
    if(isset($_GET['emp_id']) && ctype_digit(trim($_GET['emp_id']))){
        $emp_id = trim($_GET['emp_id']);
        $connect = connect($database);
        $query = $connect->prepare("SELECT * FROM EMP WHERE Empid = '$emp_id'"); 
        $query->execute();
        $employee_result = $query->fetch();
        require '../views/create.php';
    }else{
        echo 'not a valid id';die();
        header("location: ". SITE_URL . '/controller/employee_list.php');
    }
}else{
    echo 'not a valid method';die();
    header("location: ". SITE_URL . '/controller/employee_list.php');
}