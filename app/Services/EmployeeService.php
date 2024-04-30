<?php

namespace App\Services;

use App\Models\Employee;
use Exception;

class EmployeeService
{

    public function getEmployeeById($id)
    {

        // Check if $id is not null and is an integer
        if (!is_numeric($id) || intval($id) != $id) {
            throw new \InvalidArgumentException('Invalid employee ID');
        }

        try {
            // Retrieve the employee from the database
            $employee = Employee::findOrFail($id);
            return $employee;
        } catch (Exception $e) {
            // If the employee is not found, throw an exception
            throw new \Exception('Employee not found');
        }
    }

    public function updateEmployee($id, array $data)
    {
        try {
            // Retrieve the employee from the database
            $employee = Employee::find($id);

            if (!$employee) {
                throw new \Exception('Employee not found');
            }

            // Update the employee details
            $employee->update($data);

            return $employee;
        } catch (\Exception $e) {
            throw $e;
        }
    }

     /**
     * Get all employees.
     */
    public function getAllEmployees()
    {
        try {
            return Employee::all();
        } catch (\Exception $e) {
            // Handle exception as needed
            throw $e;
        }
    }


}
