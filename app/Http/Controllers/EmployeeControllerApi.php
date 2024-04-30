<?php

namespace App\Http\Controllers;

use App\Services\EmployeeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

use App\Http\Requests\UpdateEmployeeFormRequest;

class EmployeeControllerApi extends Controller
{
    protected $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function listEmployee(Request $request){
        try {
            // Retrieve the employee using the EmployeeService
            $employees = $this->employeeService->getAllEmployees();

            // Return a JSON response with the employee data
            return response()->json($employees);
        }
        catch (\Exception $e) {
            return response()->json(['error' => 'Some error happens'], 404);
        }
    }

    public function getEmployee($id){
        try {

            // Retrieve the employee using the EmployeeService
            $employee = $this->employeeService->getEmployeeById($id);

            // Return a JSON response with the employee data
            return response()->json($employee);
        }
        catch (\InvalidArgumentException $e) {
            // Rollback the transaction in case of an exception
            DB::rollBack();

            // Return a JSON response with an error message
            return response()->json(['error' => $e->getMessage()], 400);
        }
        catch (\Exception $e) {

            Log::error("FAILED TO GET EMPLOYEE DATA", ["CAUSED "=> $e->getMessage()]);
            // Return a JSON response with an error message
            return response()->json(['error' => 'Invalid employee ID'], 404);
        }
    }

    public function updateEmployee(UpdateEmployeeFormRequest $request, $id){
        try {
            // Start a database transaction
            DB::beginTransaction();

            // Update the employee details using the EmployeeService
            $updatedEmployee = $this->employeeService->updateEmployee($id, $request->all());

            // Commit the transaction
            DB::commit();

            // Return a JSON response with the updated employee data
            return response()->json($updatedEmployee);
        } catch (\Exception $e) {
            // Rollback the transaction in case of an exception
            DB::rollBack();
            Log::error("FAILED TO UPDATE EMPLOYEE", ["CAUSED "=> $e->getMessage()]);

            // Return a JSON response with an error message
            return response()->json(['error' => 'Failed to update employee details'], 500);
        }
    }

    public function downloadEmployee(Request $request){
        try {
            $employees = $this->employeeService->getAllEmployees()->toArray();

        $csvContent = $this->prepareCsvContent($employees);

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="employees.csv"',
        ];

        return response()->streamDownload(function () use ($csvContent) {
            echo $csvContent;
        }, 'employees.csv', $headers);
        } catch (\Exception $e) {
            // Handle exception as needed
            Log::error("GAGAL DOWNLOAD CSV", ["CAUSED "=> $e->getMessage()]);
            return response()->json(['error' => 'Failed to download employees CSV'], 500);
        }
    }

    private function prepareCsvContent(array $employees): string
    {
        $csv = "";

        // Get headers from the first employee data
        if (!empty($employees)) {
            $headers = array_keys($employees[0]);
            $csv .= implode(',', $headers) . "\n";
        }

        // Loop through employees and format data
        foreach ($employees as $employee) {
            $csvRow = implode(',', array_map('strval', $employee)); // Convert each element to string
            $csv .= $csvRow . "\n";
        }

        return $csv;
    }
}
