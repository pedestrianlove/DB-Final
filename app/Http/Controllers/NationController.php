<?php

namespace App\Http\Controllers;

use App\Models\Expat;
use Illuminate\Http\Request;
use App\Models\Nation;

class NationController extends Controller
{
    public function index () {
        return view('functions.nation.view', [
            'nations' => Nation::search(request(['search']))->get(),
        ]);
    }

    public function show (Nation $nation) {
        return view('functions.nation.update', [
            'nation' => $nation
        ]);
    }

    public function show_create () {
        return view('functions.nation.create');
    }
    public function create () {
        $attributes = request()->validate([
            'Code' => ['required', 'regex:/^[A-Za-z]{2}[0-9]{4}$/'],
            'Name' => ['required', 'max:14'],
            'Continent' => ['required', 'max:14'],
            'Leader' => ['required', 'max:14'],
            'FMinister' => ['required', 'max:14'],
            'Contacts' => ['required', 'max:14'],
            'Population' => ['required', 'max_digits:14', 'numeric'],
            'Area' => ['required', 'max_digits:14', 'numeric'],
            'Tel' => ['required', 'max_digits:14', 'numeric'],
        ]);

        $nation = new Nation;
        foreach ($attributes as $key => $attr){
            $nation->$key = $attr;
        }
        $nation->save();
        session()->flash ('success', 'Nation created successfully.');
        return redirect('/nation/'.$nation->Code);
    }
    public function update (Nation $nation) {
        $attributes = request()->validate([
            //'Code' => 'required',
            'Name' => ['required', 'max:14'],
            'Continent' => ['required', 'max:14'],
            'Leader' => ['required', 'max:14'],
            'FMinister' => ['required', 'max:14'],
            'Contacts' => ['required', 'max:14'],
            'Population' => ['required', 'max_digits:14', 'numeric'],
            'Area' => ['required', 'max_digits:14', 'numeric'],
            'Tel' => ['required', 'max_digits:14', 'numeric'],
            'IsFriend' => ['required']
        ]);

        $nation->update ($attributes);
        session()->flash ('success', 'Nation updated successfully.');
        return redirect('/nation/'.$nation->Code);
    }

    public function delete (Nation $nation) {
        // Delete related expat (soft)
        Expat::where('Nation_Code', $nation->Code)->delete();
        // Delete nation (soft)
        $nation->delete();
        session()->flash ('success', 'Nation deleted successfully.');
        return redirect('/nation');
    }

}
