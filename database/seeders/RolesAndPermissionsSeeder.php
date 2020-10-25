<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit schedules']);
        Permission::create(['name' => 'delete schedules']);

        // create roles and assign created permissions
        $role = Role::create(['name' => 'admin'])
            ->givePermissionTo(['edit schedules', 'delete schedules']);
    }
}
