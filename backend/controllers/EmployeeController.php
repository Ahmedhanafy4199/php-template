<?php

require_once "backend/services/EmployeeService.php";

class EmployeeController
{
    public function getAll()
    {
        $emp_ser = new EmployeeService();
        return $emp_ser->getAll();
    }
}
