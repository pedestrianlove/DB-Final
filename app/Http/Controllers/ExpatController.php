<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expat;

class ExpatController extends Controller
{
    public function index () {
        return view('functions.expat.view', [
            'expats' => Expat::all()
        ]);
    }

    public function show (Expat $expat) {
        return view('functions.expat.update', [
            'expat' => $expat
        ]);
    }
}
