<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dependent;

class DependentController extends Controller
{
    public function index () {
        return view('functions.dependent.view', [
            'dependents' => Dependent::all()
        ]);
    }

    public function show(Dependent $dependent) {
        return view('functions.dependent.update', [
            'dependent' => $dependent
        ]);
    }
}
