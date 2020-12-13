<?php

require_once "backend/services/EmployeeService.php";

class EmployeeController
{
    public function getAll()
    {
        $emp_ser = new EmployeeService();
        return $emp_ser->getAll();
    }

    public function create($emp)
    {
        $emp_ser = new EmployeeService();
        return $emp_ser->create($emp);
    }

    public function update($emp)
    {
        $emp_ser = new EmployeeService();
        return $emp_ser->update($emp);
    }

    public function delete($emp)
    {
        $emp_ser = new EmployeeService();
        return $emp_ser->delete($emp);
    }
}
