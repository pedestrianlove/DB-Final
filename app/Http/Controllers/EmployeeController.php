<?php

namespace App\Http\Controllers;

use App\Models\Dependent;
use App\Models\Expat;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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

    public function show_create ()
    {
        return view('functions.employee.create');
    }
    public function create()
    {
        $attributes = request()->validate([
            'ID' => ['required', 'max:10', 'min:10', 'unique:App\Models\Employee,ID'],
            'Name' => ['required', 'max:14'],
            'Rank' => ['required', 'max:10'],
            'Salary' => ['required', 'max_digits:8'],
            'Address' => ['required', 'max:30'],
            'Tel' => ['required', 'max_digits:14', 'numeric'],
            'Sex' => ['required', Rule::in(['M', 'F'])],
            'BirthDate' => ['required', 'date'],
            'AcceptedDate' => ['required', 'date'],
            'Picture' => ['mimes:png,jpg,jpeg,gif,webp', 'max:2048'],
        ]);

        if (request()->hasFile('Picture')) {
            $attributes['Picture'] = request()->file('Picture')->store('public/img/uploads');
        }


        $employee = new Employee;
        foreach ($attributes as $key => $attr){
            $employee->$key = $attr;
        }
        $employee->save();


        session() -> flash ('success', 'Employee created successfully.');

        return redirect('/employee/' . $employee->ID);
        //return view('functions.employee.create');
    }

    public function update (Employee $employee)
    {
        $attributes = request()->validate([
            //'ID' => ['required', 'max:10', 'min:10'],
            'Name' => ['required', 'max:14'],
            'Rank' => ['required', 'max:10'],
            'Salary' => ['required', 'max_digits:8'],
            'Address' => ['required', 'max:30'],
            'Tel' => ['required', 'max_digits:14', 'numeric'],
            'Sex' => ['required', Rule::in(['M', 'F'])],
            'BirthDate' => ['required', 'date'],
            'AcceptedDate' => ['required', 'date'],
            'Picture' => ['mimes:png,jpg,jpeg,gif,webp', 'max:2048'],
        ]);

        if (request()->hasFile('Picture')) {
            if (file_exists ($employee->Picture))
                File::delete ($employee->Picture);
            $attributes['Picture'] =
                request()->file('Picture')->store('public/img/uploads');
        }


        $employee->update($attributes);


        session() -> flash ('success', 'Employee updated successfully.');
        return redirect('/employee/' . $employee->ID);
    }

    public function delete (Employee $employee)
    {
        if (file_exists ($employee->Picture))
            File::delete ($employee->Picture);
        // Delete related dependent (soft)
        Dependent::where('Employee_ID', $employee->ID)->delete();
        // Delete related expat (soft)
        Expat::where('Employee_ID', $employee->ID)->delete();
        // Delete the Employee (soft)
        $employee->delete();

        session() -> flash ('success', 'Employee deleted successfully.');
        return redirect('/employee');
    }
}
