<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user_id = $request->user()->id;

        //Return all the employees of the specific user
        $employees = Employee::where('user_id', $user_id)->get();

        return response($employees, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_name'=>'required|max:255',
            'employee_email'=>'required|unique:employees,employee_email',
            'employee_age'=>'required|integer|min:18|max:99',
        ]);

        Employee::create([
            'employee_name'=>$request->employee_name,
            'employee_email'=>$request->employee_email,
            'employee_age'=>$request->employee_age,
            'user_id'=>$request->user()->id,
        ]);

        return response([
            'message'=>'Employee created successfully!'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Employee::findOrFail($id);

        return response($employee , 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the employee by ID if not found 404 error
        $employee = Employee::findOrFail($id);

        $request->validate([
            'employee_name' => 'required|max:255',
            'employee_email' => 'required|unique:employees,employee_email,' . $employee->id,
            'employee_age' => 'required|integer|min:18|max:99',
        ]);

        $employee->update([
            'employee_name'=>$request->employee_name,
            'employee_email'=>$request->employee_email,
            'employee_age'=>$request->employee_age,
            'user_id'=>$request->user()->id,
        ]);

        return response([
            'message' => 'Employee updated successfully!',
            'employee' => $employee,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            return response(['message' => 'Employee not found!'], 404);
        }
        else{
            $employee->delete();

            return response(['message' => 'Employee deleted successfully!'], 200);
        }
    }
}
