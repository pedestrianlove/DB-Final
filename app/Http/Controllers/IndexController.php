<?php

namespace App\Http\Controllers;

use App\Models\Dependent;
use App\Models\Expat;
use App\Models\Nation;
use App\Models\Employee;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index ()
    {
        $expats = Expat::all();
        // get number of employees over 30 for every nation
        $employeesOver30 = array_fill_keys (Nation::all()->pluck('Name')->toArray(), 0);
        foreach ($expats as $expat)
            if ($expat->Employee->Age() > 30)
                $employeesOver30[$expat->Nation->Name]++;


        // get number of employees over 30 for every continent
        $continentEmployeeList = array_fill_keys(Nation::all()->pluck('Continent')->toArray(), 0);
        foreach ($expats as $expat)
            $continentEmployeeList[$expat->Nation->Continent]++;

        // get number of dependents for every employee
        $dependents = Dependent::all();
        $numberOfDependentsOver30 = 0;
        $ageDependentsOver30 = 0;
        foreach ($dependents as $dependent)
            if ($dependent->Employee->Age() > 30) {
                $ageDependentsOver30 += $dependent->Age();
                $numberOfDependentsOver30++;
            }

        // get the avg number of dependents for employees over 30
        $numberOfEmployees = array_sum ($employeesOver30);


        return view('index', [
            'nationList' => $employeesOver30,
            'continentList' => $continentEmployeeList,
            'averageAgeDependentsOver30' => ($numberOfDependentsOver30) ? ($ageDependentsOver30 / $numberOfDependentsOver30) : 0,
            'numberOfDependentsOver30' => ($numberOfEmployees) ? round($numberOfDependentsOver30/$numberOfEmployees, 2):0,
        ]);
    }
}
