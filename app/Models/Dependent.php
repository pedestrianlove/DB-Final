<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dependent extends Model
{
    use HasFactory;
    use softDeletes;
    public $timestamps = false;

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'Employee_ID');
    }
}
