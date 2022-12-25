<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expat extends Model
{
    use HasFactory;
    use softDeletes;
    public $timestamps = false;

    public function Employee()
    {
        return $this->belongsTo(Employee::class, 'Employee_ID');
    }

    public function Nation()
    {
        return $this->belongsTo(Nation::class, 'Nation_Code');
    }

}
