<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cuti extends Model
{
    use SoftDeletes;
    protected $table = 'cuti';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
