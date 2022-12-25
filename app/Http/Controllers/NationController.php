<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nation;

class NationController extends Controller
{
    public function index () {
        return view('functions.nation.view', [
            'nations' => Nation::all()
        ]);
    }

    public function show (Nation $nation) {
        return view('functions.nation.update', [
            'nation' => $nation
        ]);
    }
}
