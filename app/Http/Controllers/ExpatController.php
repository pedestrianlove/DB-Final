<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Expat;
use App\Models\Nation;

class ExpatController extends Controller
{
    public function index () {
        return view('functions.expat.view', [
            'expats' => Expat::search(request(['search']))->get(),
        ]);
    }

    public function show (Expat $expat) {
        return view('functions.expat.update', [
            'expat' => $expat
        ]);
    }

    public function show_create () {
        return view('functions.expat.create', [
            'employees' => Employee::all(),
            'nations' => Nation::all(),
        ]);
    }

    public function create () {
        $attributes = request()->validate([
            'Nation_Code' => ['required', 'regex:/^[A-Za-z]{2}[0-9]{4}$/', 'exists:nations,Code', 'unique:expats,Nation_Code,NULL,expat_id,Employee_ID,' . request('Employee_ID')],
            'Employee_ID' => ['required', 'max:10', 'min:10', 'exists:employees,ID'],
            'Ambassador_Name' => ['required', 'max:14'],
            'StartDate' => ['required', 'date'],
        ]);

        $expat = new Expat;
        foreach ($attributes as $key => $attr){
            $expat->$key = $attr;
        }
        $expat->save();


        session() -> flash ('success', 'Expatriation updated successfully.');
        return redirect('/expat/' . $expat->expat_id);
    }


    public function update (Expat $expat) {
        $attributes = request()->validate([
        //    'Nation_Code' => ['required', 'regex:/^[A-Za-z]{2}[0-9]{4}$/', 'exists:nations,Code'],
        //    'Employee_ID' => ['required', 'max:10', 'min:10', 'exists:employees,ID'],
            'Ambassador_Name' => ['required', 'max:14'],
            'StartDate' => ['required', 'date'],
        ]);

        $expat->update($attributes);


        session() -> flash ('success', 'Expatriation updated successfully.');
        return redirect('/expat/' . $expat->expat_id);
    }

    public function delete (Expat $expat) {
        $expat->delete();
        session() -> flash ('success', 'Expatriation deleted successfully.');
        return redirect('/expat');
    }
}
