<?php

namespace Database\Seeders;

use App\Models\Pihak;
use App\Models\User;
use App\Models\Instruktur;
use App\Models\Mahasiswa;
use App\Models\Kelas;
use App\Models\Group;
use App\Models\LegalCase;
use App\Models\StudentGroup;
use App\Models\FilePersyaratan;
use App\Models\JenisFile;
use App\Models\PembiayaanPerkara;
use App\Models\PendaftaranSidang;
use App\Models\DetailPendaftaran;
use App\Models\Pembayaran;
use App\Models\PanggilanSidang;
use App\Models\Dokumen;
use App\Models\DetailPembayaran;
use App\Models\PersetujuanPihak;
use App\Models\PendaftaranPerkara;
use App\Models\DokumenPermohonan;
use App\Models\PendaftaranPermohonan;
use Illuminate\Database\Seeder;

use Database\Seeders\RoleAndPermissionSeeder;



class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Instruktur::factory()->count(5)->create();
        Mahasiswa::factory()->count(20)->create();
        Kelas::factory()->count(3)->create();
        Group::factory()->count(5)->create();
        PembiayaanPerkara::factory()->count(15)->create();
        JenisFile::factory()->count(5)->create();
        PendaftaranSidang::factory()->count(15)->create();
        FilePersyaratan::factory()->count(10)->create();
        LegalCase::factory()->count(10)->create();
        StudentGroup::factory()->count(20)->create();
        DetailPendaftaran::factory()->count(20)->create();
        Pembayaran::factory()->count(20)->create();
        PanggilanSidang::factory()->count(10)->create();
        Dokumen::factory(10)->create();
        DetailPembayaran::factory()->count(20)->create();
        Pihak::factory()->count(20)->create();
        PersetujuanPihak::factory()->count(10)->create();
        PendaftaranPerkara::factory()->count(10)->create();
        DokumenPermohonan::factory()->count(10)->create();
        PendaftaranPermohonan::factory()->count(10)->create();

        $this->call(RoleAndPermissionSeeder::class);

    }
}
