<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use SoftDeletes;
    protected $table = 'pegawai';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function cuti()
    {
        return $this->hasMany('App\Models\Cuti', 'no_induk','no_induk');
    }
}
