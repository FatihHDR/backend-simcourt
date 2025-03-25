<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pembayaran;
use App\Models\DetailPendaftaran;

class PembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DetailPendaftaran::factory()
            ->count(20)
            ->has(Pembayaran::factory()->count(3), 'pembayarans')
            ->create();
    }
}