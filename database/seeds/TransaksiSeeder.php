<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('transaksi')->delete();
        DB::table('transaksi')->insert([
            [
                'kode_transaksi' => '1',
                'kode_karyawan' => '1',
                'kode_user' => '1',
                'kode_studio' => 'LA-13',
                'kode_jadwal' => 'A13',
                'diskon' => '10000',
                'tanggal' => '2020-04-16',
            ],

            [
                'kode_transaksi' => '2',
                'kode_karyawan' => '1',
                'kode_user' => '2',
                'kode_studio' => 'LA-13',
                'kode_jadwal' => 'A13',
                'diskon' => '10000',
                'tanggal' => '2020-05-03',
            ],

            [
                'kode_transaksi' => '3',
                'kode_karyawan' => '1',
                'kode_user' => '3',
                'kode_studio' => 'LT-13',
                'kode_jadwal' => 'T13',
                'diskon' => '5000',
                'tanggal' => '2020-05-03',
            ],

            [
                'kode_transaksi' => '4',
                'kode_karyawan' => '1',
                'kode_user' => '1',
                'kode_studio' => 'LA-07',
                'kode_jadwal' => 'A07',
                'diskon' => '1000',
                'tanggal' => '2020-05-04',
            ],

            [
                'kode_transaksi' => '5',
                'kode_karyawan' => '1',
                'kode_user' => '2',
                'kode_studio' => 'LB-22',
                'kode_jadwal' => 'A22',
                'diskon' => '3000',
                'tanggal' => '2020-05-04',
            ],

            [
                'kode_transaksi' => '6',
                'kode_karyawan' => '1',
                'kode_user' => '3',
                'kode_studio' => 'LT-15',
                'kode_jadwal' => 'T15',
                'diskon' => '50000',
                'tanggal' => '2020-05-04',
            ]
        ]);
    }
}
