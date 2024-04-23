<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create students']);
        Permission::create(['name' => 'edit students']);
        Permission::create(['name' => 'delete students']);
        Permission::create(['name' => 'view students']);

        Permission::create(['name' => 'create staffs']);
        Permission::create(['name' => 'edit staffs']);
        Permission::create(['name' => 'delete staffs']);
        Permission::create(['name' => 'view staffs']);

        Permission::create(['name' => 'create parents']);
        Permission::create(['name' => 'edit parents']);
        Permission::create(['name' => 'delete parents']);
        Permission::create(['name' => 'view parents']);

        Permission::create(['name' => 'create classes']);
        Permission::create(['name' => 'edit classes']);
        Permission::create(['name' => 'delete classes']);
        Permission::create(['name' => 'view classes']);

        Permission::create(['name' => 'create subjects']);
        Permission::create(['name' => 'edit subjects']);
        Permission::create(['name' => 'delete subjects']);
        Permission::create(['name' => 'view subjects']);

        Permission::create(['name' => 'create attendence']);
        Permission::create(['name' => 'edit attendence']);
        Permission::create(['name' => 'delete attendence']);
        Permission::create(['name' => 'view attendence']);

        Permission::create(['name' => 'restrict students']);
        Permission::create(['name' => 'view restrict students']);


        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());

        // or may be done by chaining
        $role = Role::create(['name' => 'staff'])
            ->givePermissionTo([
                'create students', 'edit students', 'delete students', 'view students',
                'view staffs',
                'create parents', 'edit parents', 'delete parents', 'view parents',
                'create classes', 'edit classes', 'delete classes', 'view classes',
                'create subjects', 'edit subjects', 'delete subjects', 'view subjects',
                'create attendence', 'edit attendence', 'delete attendence', 'view attendence',
                'restrict students', 'view restrict students',
            ]);

        $role = Role::create(['name' => 'student'])
            ->givePermissionTo([
                'view students',
                'view staffs',
                'view parents',
                'view classes',
                'view subjects',
                'create attendence', 'view attendence',
                'view restrict students',
            ]);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    }
}
