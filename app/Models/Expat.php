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

    protected $primaryKey = 'expat_id';
    protected $fillable = ['Nation_Code', 'Employee_ID', 'Ambassador_Name', 'StartDate'];


    public function Employee()
    {
        return $this->belongsTo(Employee::class, 'Employee_ID');
    }

    public function Nation()
    {
        return $this->belongsTo(Nation::class, 'Nation_Code');
    }
    public function scopeSearch($query, array $filters)
    {
        $query -> when ($filters['search'] ?? false, fn ($query, $search) =>
        $query
            -> where ('Nation_Code', 'like', '%'.$search.'%')
            -> orWhere ('Employee_ID', 'like', '%'.$search.'%')
            -> orWhereHas ('Nation', fn ($query) =>
                $query -> where ('Name', 'like', '%'.$search.'%')
            )
            -> orWhereHas ('Employee', fn ($query) =>
                $query -> where ('Name', 'like', '%'.$search.'%')
            )
        );
    }
}
