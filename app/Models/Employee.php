<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use softDeletes;
    public $timestamps = false;
    protected $primaryKey = 'ID';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['ID', 'Name', 'Rank', 'Salary', 'Tel', 'Sex', 'BirthDate', 'AcceptedDate', 'Address', 'Picture'];

    public function scopeFilter($query, $filters)
    {
        if (isset ($filters['search'])) {
            return $query
                ->where('ID', 'like', '%' . request ('search') . '%')
                ->orWhere('Name', 'like', '%' . request ('search') . '%');
        }
    }

}
