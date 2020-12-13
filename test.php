<?php
require_once "backend/controllers/EmployeeController.php";
require_once "backend/models/Employee.php";


function printEmployee($list){
    echo "Total number of employees: " . sizeof($list) . "<br/>";
    foreach ($list as $emp) {
        echo "Employee number: " . $emp->getEmpNo() . "<br/>";
        echo "Employee first name: " . $emp->getFirstName() . "<br/>";
        echo "Employee last name: " . $emp->getLastName() . "<br/>";
        echo "Employee gender: " . $emp->getGender() . "<br/>";
        echo "***************<br/>";
    }
}

$emp_controller = new EmployeeController();


// get
echo "the database before any operations<br/>";
//print_r($emp_controller->getAll());
printEmployee($emp_controller->getAll());
echo "<br/>";
echo "<br/>";
echo "<br/>";
echo "<br/>";

// insert
$emp_add = new Employee();
$emp_add->setEmpNo(9);
$emp_add->setFirstName('Ali');
$emp_add->setLastName('Ahmed');
$emp_add->setGender('M');

$emp_controller->create($emp_add);

// get
echo "the database after create operation<br/>";
//print_r($emp_controller->getAll());
printEmployee($emp_controller->getAll());
echo "<br/>";
echo "<br/>";
echo "<br/>";
echo "<br/>";

// update
$emp_add->setFirstName('Mustafa');
$emp_add->setLastName('Ibrahim');
$emp_controller->update($emp_add);

// get
echo "the database after update operation of the recently added employee<br/>";
//print_r($emp_controller->getAll());
printEmployee($emp_controller->getAll());
echo "<br/>";
echo "<br/>";
echo "<br/>";
echo "<br/>";

// delete
$emp_controller->delete(9);

// get
echo "the database after delete operation of the recently added employee<br/>";
//print_r($emp_controller->getAll());
printEmployee($emp_controller->getAll());
echo "<br/>";


?>
