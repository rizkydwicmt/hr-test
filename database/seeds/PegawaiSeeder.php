<?php

use Illuminate\Database\Seeder;
use App\Models\Pegawai;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pegawai::insert([
            [
                'nama' => 'Agus',
                'alamat' => 'Jln Gaja Mada no 12, Surabaya',
                'tgl_lahir' => '1980-01-11',
                'tgl_gabung' => '2005-07-07',
                'created_by' => 'migration',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama' => 'Amin',
                'alamat' => 'Jln Imam Bonjol no 11, Mojokerto',
                'tgl_lahir' => '1977-03-07',
                'tgl_gabung' => '2005-07-07',
                'created_by' => 'migration',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama' => 'Yusuf',
                'alamat' => 'Jln A Yani Raya 15 No 14 Malang',
                'tgl_lahir' => '1973-07-09',
                'tgl_gabung' => '2006-07-07',
                'created_by' => 'migration',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama' => 'Alyssa',
                'alamat' => 'Jln Bungur Sari V no 166, Bandung',
                'tgl_lahir' => '1983-03-18',
                'tgl_gabung' => '2006-08-06',
                'created_by' => 'migration',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama' => 'Maulana',
                'alamat' => 'Jln Candi Agung, No 78 Gg 5, Jakarta',
                'tgl_lahir' => '1978-11-10',
                'tgl_gabung' => '2006-08-10',
                'created_by' => 'migration',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama' => 'Agfika',
                'alamat' => 'Jln Nangka, Jakarta Timur',
                'tgl_lahir' => '1979-02-07',
                'tgl_gabung' => '2007-01-02',
                'created_by' => 'migration',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama' => 'James',
                'alamat' => 'Jln Merpati, 8 Surabaya',
                'tgl_lahir' => '1989-03-18',
                'tgl_gabung' => '2007-04-04',
                'created_by' => 'migration',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama' => 'Octavanus',
                'alamat' => 'Jln A Yani 17, B 08 Sidoarjo',
                'tgl_lahir' => '1985-04-14',
                'tgl_gabung' => '2007-05-19',
                'created_by' => 'migration',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama' => 'Nugroho',
                'alamat' => 'Jln Duren tiga 167, Jakarta Selatan',
                'tgl_lahir' => '1984-01-01',
                'tgl_gabung' => '2008-01-16',
                'created_by' => 'migration',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama' => 'Raisa',
                'alamat' => 'Jln Kelapa Sawit, Jakarta Selatan',
                'tgl_lahir' => '1990-12-17',
                'tgl_gabung' => '2008-07-16',
                'created_by' => 'migration',
                'created_at' => date("Y-m-d H:i:s"),
            ],
        ]);
    }
}
