<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdminRole = Role::create(['name' => 'super-admin']);
        $adminRole = Role::create(['name' => 'admin']);

        $manageInstrukturPermission = Permission::create(['name' => 'manage instruktur']);
        $manageKelasPermission = Permission::create(['name' => 'manage kelas']);
        $viewMahasiswaPermission = Permission::create(['name' => 'view mahasiswa']);

        $superAdminRole->givePermissionTo([
            $manageInstrukturPermission,
            $manageKelasPermission,
            $viewMahasiswaPermission,
        ]);

        $adminRole->givePermissionTo([
            $manageInstrukturPermission,
            $viewMahasiswaPermission,
        ]);
    }
}