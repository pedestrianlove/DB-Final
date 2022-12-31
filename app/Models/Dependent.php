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
    protected $fillable = ['Employee_ID', 'ID', 'Name', 'Sex', 'Relationship'];

    public function Employee()
    {
        return $this->belongsTo(Employee::class, 'Employee_ID');
    }

}
