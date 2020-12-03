<?php
require_once "backend/controllers/EmployeeController.php";
$emp_con = new EmployeeController();
print_r($emp_con->getAll());
?>
