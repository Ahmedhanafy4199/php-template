<?php

require_once "backend/dao/EmployeeDao.php";

class EmployeeService
{

    public function getAll(){
        $emp_dao = new EmployeeDao();
        return $emp_dao->getAll();
    }
}
