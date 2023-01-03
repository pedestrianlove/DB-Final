<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Dependent extends Model
{
    use HasFactory;
    use softDeletes;
    public $timestamps = false;

    protected $primaryKey = 'dependent_id';
    protected $fillable = ['Employee_ID', 'ID', 'Name', 'Sex', 'Relationship'];

    public function Employee()
    {
        return $this->belongsTo(Employee::class, 'Employee_ID');
    }
    public function scopeSearch($query, array $filters)
    {
        $query -> when ($filters['search'] ?? false, fn ($query, $search) =>
        $query
            -> where ('ID', 'like', '%'.$search.'%')
            -> orWhere ('Name', 'like', '%'.$search.'%')
            -> orWhereHas ('Employee', fn ($query) =>
                $query -> where ('Name', 'like', '%'.$search.'%')
            )
        );
    }

    public function Age () {
        return Carbon::parse ($this->BirthDate)->age;
    }
}
