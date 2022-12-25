<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nation extends Model
{
    use HasFactory;
    use softDeletes;
    public $timestamps = false;

    protected $primaryKey = 'Code';
    public $incrementing = false;


}
