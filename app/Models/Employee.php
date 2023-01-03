<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Employee extends Model
{
    use HasFactory;
    use softDeletes;
    public $timestamps = false;
    protected $primaryKey = 'ID';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['ID', 'Name', 'Rank', 'Salary', 'Tel', 'Sex', 'BirthDate', 'AcceptedDate', 'Address', 'Picture'];

    public function scopeSearch($query, array $filters)
    {
       $query -> when ($filters['search'] ?? false, fn ($query, $search) =>
            $query
                -> where ('ID', 'like', '%'.$search.'%')
                -> orWhere ('Name', 'like', '%'.$search.'%')
                -> orWhere ('Rank', 'like', '%'.$search.'%')
       );
    }

    public function Age () {
        return Carbon::parse ($this->BirthDate)->age;
    }


}
