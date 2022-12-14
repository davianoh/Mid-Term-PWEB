<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('karyawan')->delete();
        DB::table('karyawan')->insert([
            [
                'kode_karyawan' => '1',
                'nama' => 'Rivaldo',
                'email'=>'RivaldoAdmin@gmail.com',
                'password' => bcrypt('admin'),
            ],

            [
                'kode_karyawan' => '2',
                'nama' => 'Iqbal',
                'email'=>'IqbalAdmin@gmail.com',
                'password' => bcrypt('admin'),
            ],

            [
                'kode_karyawan' => '3',
                'nama' => 'Jefri',
                'email'=>'JefriAdmin@gmail.com',
                'password' => bcrypt('admin'),
            ]

        ]);
    }
}
