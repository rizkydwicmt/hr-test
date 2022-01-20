<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Cuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PegawaiController extends Controller
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
        $totalRecords = Pegawai::select('id')->count();

        //for batter speed query
        if ($searchValue !== '') {
            $totalRecordswithFilter = Pegawai::select('id')
                ->where('no_induk', 'like', '%' . $searchValue . '%')
                ->orWhere('nama', 'like', '%' . $searchValue . '%')
                ->orWhere('alamat', 'like', '%' . $searchValue . '%')
                ->orWhere('tgl_lahir', 'like', '%' . $searchValue . '%')
                ->orWhere('tgl_gabung', 'like', '%' . $searchValue . '%')
                ->count();

            // Fetch records
            $records = Pegawai::where('no_induk', 'like', '%' . $searchValue . '%')
                ->orWhere('nama', 'like', '%' . $searchValue . '%')
                ->orWhere('alamat', 'like', '%' . $searchValue . '%')
                ->orWhere('tgl_lahir', 'like', '%' . $searchValue . '%')
                ->orWhere('tgl_gabung', 'like', '%' . $searchValue . '%')
                ->orderBy($columnName, $columnSortOrder)
                ->offset($start)
                ->limit($rowperpage)
                ->get();
        } else {
            $totalRecordswithFilter = $totalRecords;

            // Fetch records
            $records = Pegawai::orderBy($columnName, $columnSortOrder)
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

    public function list_limit(Request $request, $count)
    {
        ## Read value
        $draw = $request->get('draw');
        $start = 0;
        $rowperpage = $count; // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = 'id'; // Column name
        $columnSortOrder = 'asc'; // asc or desc
        $searchValue = $search_arr['value'] ? $search_arr['value'] : ''; // Search value

        // Total records
        $totalRecords = Pegawai::select('id')
            ->offset($start)
            ->limit($rowperpage)
            ->get();

        $totalRecords = count($totalRecords);

        $records = Pegawai::orderBy($columnName, $columnSortOrder)
            ->offset($start)
            ->limit($rowperpage)
            ->get();

        $response = [
            'draw' => intval($draw),
            'iTotalRecords' => $totalRecords,
            'iTotalDisplayRecords' => $totalRecords,
            'aaData' => $records,
        ];

        echo json_encode($response);
        exit();
    }

    public function get_ambil_cuti(Request $request)
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
        $totalRecords = Pegawai::select('id')
            ->join('cuti', 'pegawai.no_induk', 'cuti.no_induk')
            ->count();

        //for batter speed query
        if ($searchValue !== '') {
            $totalRecordswithFilter = Pegawai::select('id')
                ->join('cuti', 'pegawai.no_induk', 'cuti.no_induk')
                ->Where('pegawai.nama', 'like', '%' . $searchValue . '%')
                ->orWhere('pegawai.no_induk', 'like', '%' . $searchValue . '%')
                ->orWhere('cuti.tgl_cuti', 'like', '%' . $searchValue . '%')
                ->orWhere('cuti.keterangan', 'like', '%' . $searchValue . '%')
                ->count();

            // Fetch records
            $records = Pegawai::select('pegawai.nama', 'cuti.*')
                ->join('cuti', 'pegawai.no_induk', 'cuti.no_induk')
                ->Where('pegawai.nama', 'like', '%' . $searchValue . '%')
                ->orWhere('pegawai.no_induk', 'like', '%' . $searchValue . '%')
                ->orWhere('cuti.tgl_cuti', 'like', '%' . $searchValue . '%')
                ->orWhere('cuti.keterangan', 'like', '%' . $searchValue . '%')
                ->orderBy($columnName, $columnSortOrder)
                ->offset($start)
                ->limit($rowperpage)
                ->get();
        } else {
            $totalRecordswithFilter = $totalRecords;

            $records = Pegawai::select('pegawai.nama', 'cuti.*')
                ->join('cuti', 'pegawai.no_induk', 'cuti.no_induk')
                ->orderBy($columnName, $columnSortOrder)
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

    public function get_ambil_cuti_lebih(Request $request)
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
        $totalRecords = Pegawai::select('pegawai.id', 'cuti.id')
            ->join('cuti', 'pegawai.no_induk', 'cuti.no_induk')
            ->groupBy('pegawai.id')
            ->havingRaw('cuti.id > 1')
            ->get();

        $totalRecords = count($totalRecords);

        //for batter speed query
        if ($searchValue !== '') {
            $totalRecordswithFilter = Pegawai::select('pegawai.id', 'cuti.id')
                ->join('cuti', 'pegawai.no_induk', 'cuti.no_induk')
                ->Where('pegawai.nama', 'like', '%' . $searchValue . '%')
                ->orWhere('pegawai.no_induk', 'like', '%' . $searchValue . '%')
                ->orWhere('cuti.tgl_cuti', 'like', '%' . $searchValue . '%')
                ->orWhere('cuti.keterangan', 'like', '%' . $searchValue . '%')
                ->groupBy('pegawai.id')
                ->havingRaw('cuti.id > 1')
                ->orderBy('pegawai.'.$columnName, $columnSortOrder)
                ->offset($start)
                ->limit($rowperpage)
                ->get();

            $totalRecordswithFilter = count($totalRecordswithFilter);

            // Fetch records
            $records = Pegawai::select('pegawai.nama', 'cuti.*')
                ->join('cuti', 'pegawai.no_induk', 'cuti.no_induk')
                ->Where('pegawai.nama', 'like', '%' . $searchValue . '%')
                ->orWhere('pegawai.no_induk', 'like', '%' . $searchValue . '%')
                ->orWhere('cuti.tgl_cuti', 'like', '%' . $searchValue . '%')
                ->orWhere('cuti.keterangan', 'like', '%' . $searchValue . '%')
                ->groupBy('pegawai.id')
                ->havingRaw('cuti.id > 1')
                ->orderBy($columnName, $columnSortOrder)
                ->offset($start)
                ->limit($rowperpage)
                ->get();
        } else {
            $totalRecordswithFilter = $totalRecords;

            // Fetch records
            $records = Pegawai::select('pegawai.nama', 'cuti.*')
                ->join('cuti', 'pegawai.no_induk', 'cuti.no_induk')
                ->groupBy('pegawai.id')
                ->havingRaw('cuti.id > 1')
                ->orderBy($columnName, $columnSortOrder)
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
        Pegawai::create([
            'nama' => $request->add_nama,
            'alamat' => $request->add_alamat,
            'tgl_lahir' => $request->add_tgl_lahir,
            'tgl_gabung' => $request->add_tgl_gabung,
            'created_by' => '1',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function update(Request $request)
    {
        Pegawai::where('no_induk', $request->edit_no_induk)->update([
            'nama' => $request->edit_nama,
            'alamat' => $request->edit_alamat,
            'tgl_lahir' => $request->edit_tgl_lahir,
            'tgl_gabung' => $request->edit_tgl_gabung,
            'updated_by' => '1',
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function delete($id)
    {
        Pegawai::findOrFail($id)->delete();
    }
}
