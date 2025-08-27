<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Buat Permissions (Izin)
        Permission::create(['name' => 'manage products']);
        Permission::create(['name' => 'manage categories']);
        Permission::create(['name' => 'manage suppliers']);
        Permission::create(['name' => 'manage stock']);
        Permission::create(['name' => 'view reports']);
        Permission::create(['name' => 'manage users']);

        // Buat Roles dan berikan permissions

        // Peran untuk Staf Gudang
        $stafRole = Role::create(['name' => 'Staf Gudang']);
       $stafRole->givePermissionTo([
    // HANYA berikan izin untuk mengelola stok
    'manage stock',
]);

        // Peran untuk Admin - mendapatkan semua izin
        $adminRole = Role::create(['name' => 'Admin']);
        $adminRole->givePermissionTo(Permission::all());
    }
}
