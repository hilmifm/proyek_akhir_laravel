<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Siswa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Siswa')->insert([
            'nama'=> 'Satrio',
            'nomor_induk'=> '1000',
            'alamat'=> 'Tegal',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('Siswa')->insert([
            'nama'=> 'Umar',
            'nomor_induk'=> '1001',
            'alamat'=> 'Semarang',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('Siswa')->insert([
            'nama'=> 'Maria',
            'nomor_induk'=> '1002',
            'alamat'=> 'Semarang',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
    }
}
