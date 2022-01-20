<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function returnUniqueArrayAttribute($array, $key) 
    {
        $result = [];
        foreach($array as $i) {
            if(!isset($result[$i->{$key}])) {
            $result[$i->{$key}] = $i;
            }
        }
        sort($result);
        return $result;
    }

    protected function cek_sesi_aktif(){
        if(session('nama') != null){
            redirect()->to('/')->send();
        }
    }

    protected function cek_sesi_nonaktif(){
        if(session('nama') == null){
            redirect()->to('login')->with('alert-primary','Silahkan login terlebih dahulu')->send();
        }
    }

    protected function success($message = 'Permintaan berhasil diproses', $data = [])
    {
    	$response['list'] = $data->items();
    	$response['metadata']['message'] = $message;
        $response['metadata']['response_status'] = SUKSES;
        $response['metadata']['current_page'] = $data->currentPage();
        $response['metadata']['total_page'] = $data->lastPage();
        $response['metadata']['total_row_current_page'] = $data->count();
        $response['metadata']['total_data'] = $data->total();

        return response()->json($response);
    }

    // pesan untuk ambil data tanpa pagination
    protected function success_list($message = 'Permintaan berhasil diproses', $data = [])
    {
    	$response['list'] = $data;
    	$response['metadata']['message'] = $message;
        $response['metadata']['response_status'] = SUKSES;
        $response['metadata']['total_data'] = count($data);

        return response()->json($response);
    }

    // pesan sukses untuk tambah, ubah, hapus
    protected function success_cud($message = 'Permintaan berhasil diproses', $data)
    {
        $response['list'] = $data;
        $response['metadata']['message'] = $message;
        $response['metadata']['response_status'] = SUKSES;

        return response()->json($response);
    }

    // pesan untuk ambil data pagination dari data array
    protected function success_pagination_from_array($message = 'Permintaan berhasil diproses', $data = [], $count_data, $current_page)
    {
        $response['list'] = $data;
        $response['metadata']['message'] = $message;
        $response['metadata']['response_status'] = SUKSES;
        $response['metadata']['current_page'] = $current_page;
        $response['metadata']['total_data'] = $count_data;

        return response()->json($response);
    }

    protected function failure($message = 'Permintaan gagal diproses', $data = [])
    {
    	$response['list'] = '';
        $response['metadata']['message'] = $message;
        $response['metadata']['response_status'] = GAGAL;

        return response()->json($response);
    }

    protected function notFound($message = 'Data tidak ditemukan', $data = [])
    {
        $response['list'] = '';
    	$response['metadata']['message'] = $message;
        $response['metadata']['response_status'] = DATA_TIDAK_DITEMUKAN;

        return response()->json($response);
    }

    protected function unauthorized($message = 'Anda tidak memiliki hak akses. Silakan login terlebih dahulu', $data = [])
    {
    	$response['response_status'] = BELUM_MEMILIKI_HAK_AKSES;
    	$response['message'] = $message;
    	$response['data'] = $data;

        return response()->json($response);
    }

    protected function convertUmur($tanggal_lahir = '')
    {
        if (trim($tanggal_lahir) != '') {
            $tahun = Carbon::parse(trim($tanggal_lahir))->diffInYears(Carbon::today()->format('Y-m-d'));
            if ($tahun > 0) $umur = $tahun . ' tahun';
            else {
                $bulan = Carbon::parse(trim($tanggal_lahir))->diffInMonths(Carbon::today()->format('Y-m-d'));
                if ($bulan > 0) $umur = $bulan . ' bulan';
                else $umur = Carbon::parse(trim($tanggal_lahir))->diffInDays(Carbon::today()->format('Y-m-d'));
            }

            return $umur;
        }

        return trim($tanggal_lahir);
    }

    protected function validateData($data)
    {
        if (is_null($data)) return true;
        return false;
    }

    protected function validateArrayData($data)
    {
        if (empty($data)) return false;
        return true;
    }

    protected function createdBy($input = [])
    {
        $input['operator'] = $input['editor'] = $input['created_by'] = $input['updated_by'] = NULL;
        $input['tgl_input'] = $input['tgl_update'] = $input['updated'] = date('Y-m-d H:i:s');

        return $input;
    }

    protected function updatedBy($input = [])
    {
        $input['editor'] = $input['updated_by'] = NULL;
        $input['tgl_update'] = date('Y-m-d H:i:s');

        return $input;
    }

    protected function deletedBy($input = [])
    {
        $input['editor'] = $input['updated_by'] = $input['deleted_by'] = NULL;
        $input['tgl_update'] = date('Y-m-d H:i:s');

        return $input;
    }

    protected function tanggal_indo($date)
    {
        $bulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

        return date('d', strtotime($date)).' '.$bulan[date('n', strtotime($date))].' '.date('Y', strtotime($date));
    }

    protected function convertBulan($bulan = 0)
    {
        $array_bulan = [
            0 => 'Tidak Terdefinisi',
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

        return $array_bulan[$bulan];
    }

    public function public_path($path = '')
    {
        return env('PUBLIC_PATH', base_path('public')) . ($path ? '/' . $path : $path);
    }

    public function rupiah($angka){
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
    }
    
    public function saveImage($images,$path,$type){
        $files           = $images;
        $destinationPath = $this->public_path($path);
        $imageName       = Carbon::now()->format('dmYHis'). rand(0,20) .'.png';

        $files = str_replace("data:".$type.";base64,", '', $files);
        $files = str_replace(' ', '+', $files);
        file_put_contents($destinationPath. '/' .$imageName, base64_decode($files));
        return $imageName;
    }

    public function editImage($images,$path){
        $files           = $images;
        $destinationPath = $this->public_path($path);
        $imageName       = Carbon::now()->format('dmYHis'). rand(0,20) .'.png';

        $files = str_replace('data:image/png;base64,', '', $files);
        $files = str_replace(' ', '+', $files);
        file_put_contents($destinationPath. '/' .$imageName, base64_decode($files));
        return $imageName;
    }
}
