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
            $emp = new Employee();
            $result->data_seek($j);
            $emp->setEmpNo($result->fetch_assoc()['emp_no']);
            $result->data_seek($j);
            $emp->setBirthDate($result->fetch_assoc()['birth_date']);
            $result->data_seek($j);
            $emp->setFirstName($result->fetch_assoc()['first_name']);
            $result->data_seek($j);
            $emp->setLastName($result->fetch_assoc()['last_name']);
            $result->data_seek($j);
            $emp->setGender($result->fetch_assoc()['gender']);
            $result->data_seek($j);
            $emp->setHireDate($result->fetch_assoc()['hire_date']);
            $arr_emp[] = $emp;
        }

        $result->close();
        $connection->close();
        return $arr_emp;
    }

    public function create($emp)
    {
        $db_hostname = 'localhost';
        $db_database = 'test3';
        $db_username = 'root';
        $db_password = '';

        $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
        if ($connection->connect_error) die($connection->connect_error);


        $e_n = $emp->getEmpNo();
        $e_f = $emp->getFirstName();
        $e_l = $emp->getLastName();
        $e_g = $emp->getGender();

        $query = "INSERT INTO employees (emp_no,first_name, last_name, gender) VALUES ($e_n, '$e_f', '$e_l', '$e_g')";
        $result = $connection->query($query);

        if (!$result) die($connection->error);

        $connection->close();
    }

    public function update($emp)
    {
        $db_hostname = 'localhost';
        $db_database = 'test3';
        $db_username = 'root';
        $db_password = '';

        $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
        if ($connection->connect_error) die($connection->connect_error);


        $e_n = $emp->getEmpNo();
        $e_f = $emp->getFirstName();
        $e_l = $emp->getLastName();
        $e_g = $emp->getGender();
        $query = "UPDATE employees SET first_name = '$e_f', last_name = '$e_l', gender = '$e_g' WHERE emp_no = $e_n";
        $result = $connection->query($query);

        if (!$result) die($connection->error);

        $connection->close();
    }

    public function delete($e_n)
    {
        $db_hostname = 'localhost';
        $db_database = 'test3';
        $db_username = 'root';
        $db_password = '';

        $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
        if ($connection->connect_error) die($connection->connect_error);


        $query = "DELETE FROM employees WHERE emp_no = $e_n";
        $result = $connection->query($query);

        if (!$result) die($connection->error);

        $connection->close();
    }
}
