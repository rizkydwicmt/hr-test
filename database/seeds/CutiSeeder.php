<?php

use Illuminate\Database\Seeder;
use App\Models\Cuti;

class CutiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cuti::insert([
            [
                'no_induk' => 'IP06001',
                'tgl_cuti' => '2020-07-02',
                'lama_cuti' => '2',
                'keterangan' => 'Acara Keluarga',
                'created_by' => 'migration',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'no_induk' => 'IP06001',
                'tgl_cuti' => '2020-07-18',
                'lama_cuti' => '2',
                'keterangan' => 'Anak Sakit',
                'created_by' => 'migration',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'no_induk' => 'IP06006',
                'tgl_cuti' => '2020-07-19',
                'lama_cuti' => '1',
                'keterangan' => 'Nenek Sakit',
                'created_by' => 'migration',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'no_induk' => 'IP06007',
                'tgl_cuti' => '2020-07-23',
                'lama_cuti' => '1',
                'keterangan' => 'Sakit',
                'created_by' => 'migration',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'no_induk' => 'IP06004',
                'tgl_cuti' => '2020-07-29',
                'lama_cuti' => '5',
                'keterangan' => 'Menikah',
                'created_by' => 'migration',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'no_induk' => 'IP06003',
                'tgl_cuti' => '2020-07-30',
                'lama_cuti' => '2',
                'keterangan' => 'Acara Keluarga',
                'created_by' => 'migration',
                'created_at' => date("Y-m-d H:i:s"),
            ],
        ]);
    }
}
