<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dependent;
use App\Models\Employee;
use Illuminate\Validation\Rule;
use Livewire\Component;

class DependentController extends Controller
{
    public function index () {
        return view('functions.dependent.view', [
            'dependents' => Dependent::search(request(['search']))->get(),
        ]);
    }

    public function show(Dependent $dependent) {
        return view('functions.dependent.update', [
            'dependent' => $dependent
        ]);
    }
    public function show_create() {
        return view('functions.dependent.create', [
            'employees' => Employee::all()
        ]);
    }

    public function create () {
        $attributes = request()->validate([
            //'ID' => ['required', 'max:10', 'min:10'],
            'ID' => ['required', 'max:10', 'min:10', 'unique:dependents,ID,NULL,dependent_id,Employee_ID,' . request('Employee_ID')],
            'Employee_ID' => ['required', 'max:10', 'min:10', 'exists:employees,ID'],
            'Name' => ['required', 'max:14'],
            'Sex' => ['required', Rule::in(['M', 'F'])],
            'Relationship' => ['required', 'max:6'],
        ]);

        $dependent = new Dependent;
        foreach ($attributes as $key => $attr){
            $dependent->$key = $attr;
        }
        $dependent->save ();


        session() -> flash ('success', 'Dependent created successfully.');
        return redirect('/dependent/' . $dependent->dependent_id);
    }

    public function update(Dependent $dependent) {
        $attributes = request()->validate([
            //'ID' => ['required', 'max:10', 'min:10'],
            //'Employee_ID' => ['required', 'max:10', 'min:10'],
            'Name' => ['required', 'max:14'],
            'Sex' => ['required', Rule::in(['M', 'F'])],
            'Relationship' => ['required', 'max:6'],
        ]);

        $dependent->update($attributes);


        session() -> flash ('success', 'Dependent updated successfully.');
        return redirect('/dependent/' . $dependent->dependent_id);

    }

    public function delete (Dependent $dependent) {
        $dependent->delete();

        session() -> flash ('success', 'Dependent deleted successfully.');
        return redirect('/dependent');
    }
}
