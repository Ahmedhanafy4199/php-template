<?php

require_once "backend/dao/EmployeeDao.php";

class EmployeeService
{

    public function getAll(){
        $emp_dao = new EmployeeDao();
        return $emp_dao->getAll();
    }

    public function create($emp){
        $emp_dao = new EmployeeDao();
        $emp_dao->create($emp);
    }

    public function update($emp){
        $emp_dao = new EmployeeDao();
        $emp_dao->update($emp);
    }

    public function delete($emp){
        $emp_dao = new EmployeeDao();
        $emp_dao->delete($emp);
    }
}
