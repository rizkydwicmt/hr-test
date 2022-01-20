<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function cuti()
    {
        return $this->hasMany('App\Models\Cuti', 'no_induk','no_induk');
    }
}
