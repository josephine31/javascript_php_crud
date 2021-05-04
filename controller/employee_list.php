<?php

session_start();

require '../config.php';
require '../functions.php';

$connect = connect($database);

$query = $connect->prepare("SELECT * FROM EMP ORDER BY Empid DESC"); 
$query->execute();
$employees = $query->fetchAll();


require '../views/index.php';
$_SESSION["mssg"] = "";
