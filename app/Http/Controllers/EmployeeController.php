<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('functions.employee.view', [
            'employees' => Employee::all()
        ]);
    }

    public function show(Employee $employee)
    {
        return view('functions.employee.update', [
            'employee' => $employee
        ]);
    }
/*
    public function update (Employee $employee)
    {
        $attributes = request()->validate([
            'ID' => 'required',
            'Name' => 'required',
            'Address' => 'required',
            'Phone' => 'required',
            'Email' => 'required',
            'Salary' => 'required',
            'Department' => 'required',
            'Manager_ID' => 'required',
            'Nation_Code' => 'required',
        ]);
        return redirect('/employee');
    }
*/
}
