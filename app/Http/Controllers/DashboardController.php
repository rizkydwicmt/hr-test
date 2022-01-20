<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Cuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'total_karyawan' => Pegawai::select('id')->count(),
            'total_cuti' => Cuti::select('id')->count()
        ];

        return view('dashboard', $data);
    }
}
