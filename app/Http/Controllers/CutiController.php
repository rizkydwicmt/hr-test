<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cuti;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CutiController extends Controller
{
    public function list(Request $request)
    {
        ## Read value
        $draw = $request->get('draw');
        $start = $request->get('start');
        $rowperpage = $request->get('length'); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value'] ? $search_arr['value'] : ''; // Search value

        // Total records
        $totalRecords = Cuti::select('id')->count();

        //for batter speed query
        if ($searchValue !== '') {
            $totalRecordswithFilter = Cuti::select('id')
                ->where('no_induk', 'like', '%' . $searchValue . '%')
                ->orWhere('tgl_cuti', 'like', '%' . $searchValue . '%')
                ->orWhere('lama_cuti', 'like', '%' . $searchValue . '%')
                ->orWhere('keterangan', 'like', '%' . $searchValue . '%')
                ->count();

            // Fetch records
            $records = Cuti::where('no_induk', 'like', '%' . $searchValue . '%')
                ->orWhere('tgl_cuti', 'like', '%' . $searchValue . '%')
                ->orWhere('lama_cuti', 'like', '%' . $searchValue . '%')
                ->orWhere('keterangan', 'like', '%' . $searchValue . '%')
                ->orderBy($columnName, $columnSortOrder)
                ->offset($start)
                ->limit($rowperpage)
                ->get();
        } else {
            $totalRecordswithFilter = $totalRecords;

            // Fetch records
            $records = Cuti::orderBy($columnName, $columnSortOrder)
                ->offset($start)
                ->limit($rowperpage)
                ->get();
        }

        $response = [
            'draw' => intval($draw),
            'iTotalRecords' => $totalRecords,
            'iTotalDisplayRecords' => $totalRecordswithFilter,
            'aaData' => $records,
        ];

        echo json_encode($response);
        exit();
    }

    public function create(Request $request)
    {
        $cek = $this->cek_jatah($request->add_no_induk_cuti);
        if ($cek < $request->add_lama_cuti) {
            $massage = $cek > 0 ? 'Cuti yang anda masukkan lebih besar dari jatah sisa anda, sisa Jatah cuti  anda '.$cek : 'Jatah cuti anda telah habis';
            echo $massage;
            exit();
        }

        Cuti::create([
            'no_induk' => $request->add_no_induk_cuti,
            'tgl_cuti' => $request->add_tgl_cuti,
            'lama_cuti' => $request->add_lama_cuti,
            'keterangan' => $request->add_keterangan_cuti,
            'created_by' => '1',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function update(Request $request)
    {
        Cuti::findOrFail($request->edit_id_cuti)->update([
            'no_induk' => $request->edit_no_induk_cuti,
            'tgl_cuti' => $request->edit_tgl_cuti,
            'lama_cuti' => $request->edit_lama_cuti,
            'keterangan' => $request->edit_keterangan_cuti,
            'updated_by' => '1',
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function delete($id)
    {
        Cuti::findOrFail($id)->delete();
    }

    function cek_jatah($no_induk)
    {
        $tgl_gabung = Pegawai::select('tgl_gabung')
            ->where('no_induk', $no_induk)
            ->get()[0]->tgl_gabung;
        $lama_gabung = Carbon::parse($tgl_gabung)
            ->diff(Carbon::now())
            ->format('%y');
        $total_jatah = ($lama_gabung + 1) * 12;
        $cuti_diambil = Cuti::where('no_induk', $no_induk)->sum('lama_cuti');
        $jatah = $total_jatah - $cuti_diambil;
        return $jatah;
    }
}
