<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'tambah-magang']);
        Permission::create(['name' => 'edit-magang']);
        Permission::create(['name' => 'delete-magang']);
        
        Permission::create(['name' => 'tambah-aktivitas']);
        Permission::create(['name' => 'edit-aktivitas']);
        Permission::create(['name' => 'delete-aktivitas']);

        $admin = Role::create(['name' => 'admin']);
        $magang = Role::create(['name' => 'magang']);
        Role::create(['name' => 'kandidat']);

        $admin->givePermissionTo([
            'tambah-magang',
            'edit-magang',
            'delete-magang'
        ]);

        $magang->givePermissionTo([
            'tambah-aktivitas',
            'edit-aktivitas',
            'delete-aktivitas'
        ]);

    }
}
