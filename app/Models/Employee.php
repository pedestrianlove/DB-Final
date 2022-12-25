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

    /*
    public function scopeFilter($query, array $filters)
    {
        if ($filters ('search') != null) {
            return $query
                ->where('ID', 'like', '%' . request ('search') . '%')
                ->orWhere('Name', 'like', '%' . request ('search') . '%');
        }
    }
*/

}
