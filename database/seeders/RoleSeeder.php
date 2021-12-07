<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        ##ROLE##
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Vendor']);


        ##PERMISSION##
        ##DASH##
        Permission::create(['name' => 'dash.home.index'])->syncRoles([$role1, $role2]);

        ##TODO##
        Permission::create(['name' => 'dash.todos.show'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'dash.todos.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'dash.todos.update'])->syncRoles([$role1]);
        Permission::create(['name' => 'dash.todos.destroy'])->syncRoles([$role1]);


        ##USER##
        Permission::create(['name' => 'dash.users.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'dash.users.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'dash.users.update'])->syncRoles([$role1]);


        ##PRODUCT##
        Permission::create(['name' => 'dash.products.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'dash.products.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'dash.products.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'dash.products.update'])->syncRoles([$role1]);
        Permission::create(['name' => 'dash.products.show'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'dash.products.destroy'])->syncRoles([$role1]);


        ##CLIENT##
        Permission::create(['name' => 'dash.clients.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'dash.clients.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'dash.clients.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'dash.clients.update'])->syncRoles([$role1]);
        Permission::create(['name' => 'dash.clients.show'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'dash.clients.destroy'])->syncRoles([$role1]);
    }
}
