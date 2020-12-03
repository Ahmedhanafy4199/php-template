<?php

require_once "backend/models/Employee.php";


class EmployeeDao
{
    public function getAll()
    {
        $db_hostname = 'localhost';
        $db_database = 'test3';
        $db_username = 'root';
        $db_password = '';

        $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
        if ($connection->connect_error) die($connection->connect_error);


        $query = "SELECT * FROM employees";
        $result = $connection->query($query);
        if (!$result) die($connection->error);

        $arr_emp = array();
        $rows = $result->num_rows;

        for ($j = 0; $j < $rows; ++$j) {
            $result->data_seek($j);
            $emp = new Employee();
            $emp->setEmpNo($result->fetch_assoc()['emp_no']);
            $emp->setBirthDate($result->fetch_assoc()['birth_date']);
            $emp->setFirstName($result->fetch_assoc()['first_name']);
            $emp->setLastName($result->fetch_assoc()['last_name']);
            $emp->setGender($result->fetch_assoc()['gender']);
            $emp->setHireDate($result->fetch_assoc()['hire_date']);

            $arr_emp[] = $emp;
        }

        $result->close();
        $connection->close();
        return $arr_emp;
    }
}
