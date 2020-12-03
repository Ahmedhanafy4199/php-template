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
//        else echo 'Connected<br/>';


        $query = "SELECT * FROM employees";
        $result = $connection->query($query);
        if (!$result) die($connection->error);
//        else echo 'Done<br/>';

        $arr_emp = array();
        $rows = $result->num_rows;
        for ($j = 0; $j < $rows; ++$j) {
            $emp = new Employee();
            $result->data_seek($j);
            $emp->setEmpNo($result->fetch_assoc()['emp_no']);
            $result->data_seek($j);
            $emp->setEmpNo($result->fetch_assoc()['birth_date']);
            $result->data_seek($j);
            $emp->setEmpNo($result->fetch_assoc()['first_name']);
            $result->data_seek($j);
            $emp->setEmpNo($result->fetch_assoc()['last_name']);
            $result->data_seek($j);
            $emp->setEmpNo($result->fetch_assoc()['gender']);
            $result->data_seek($j);
            $emp->setEmpNo($result->fetch_assoc()['hire_date']);
            $arr_emp[] = $emp;
//            $result->data_seek($j);
//            echo 'emp_no: ' . $result->fetch_assoc()['emp_no'] . '<br>';
//            $result->data_seek($j);
//            echo 'birth_date: ' . $result->fetch_assoc()['birth_date'] . '<br>';
//            $result->data_seek($j);
//            echo 'first_name: ' . $result->fetch_assoc()['first_name'] . '<br>';
//            $result->data_seek($j);
//            echo 'last_name: ' . $result->fetch_assoc()['last_name'] . '<br>';
//            $result->data_seek($j);
//            echo 'gender: ' . $result->fetch_assoc()['gender'] . '<br>';
//            $result->data_seek($j);
//            echo 'hire_date: ' . $result->fetch_assoc()['hire_date'] . '<br>';


//            echo "*****************************************<br/>";
        }
        $result->close();
        $connection->close();
        return $arr_emp;
    }
}
