<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::create(['name' => 'admin']);
        $role_advanced = Role::create(['name' => 'advanced']);
        $role_agent = Role::create(['name' => 'agent']);
        $role_guest = Role::create(['name' => 'guest']);

        $permission_create_role = Permission::create(['name' => 'create role']);
        $permission_read_role = Permission::create(['name' => 'read role']);
        $permission_update_role = Permission::create(['name' => 'update role']);
        $permission_delete_role = Permission::create(['name' => 'delete role']);

        $permission_create_cardboard = Permission::create(['name' => 'create cardboard']);
        $permission_sell_cardboard = Permission::create(['name' => 'sell cardboard']);
        $permission_buy_cardboard = Permission::create(['name' => 'buy cardboard']);
        $permission_read_cardboard = Permission::create(['name' => 'read cardboard']);
        $permission_update_cardboard = Permission::create(['name' => 'update cardboard']);
        $permission_delete_cardboard = Permission::create(['name' => 'delete cardboard']);

        $permission_create_country = Permission::create(['name' => 'create country']);
        $permission_read_country = Permission::create(['name' => 'read country']);
        $permission_update_country = Permission::create(['name' => 'update country']);
        $permission_delete_country = Permission::create(['name' => 'delete country']);
        
        $permission_create_state = Permission::create(['name' => 'create state']);
        $permission_read_state = Permission::create(['name' => 'read state']);
        $permission_update_state = Permission::create(['name' => 'update state']);
        $permission_delete_state = Permission::create(['name' => 'delete state']);

        $permission_create_city = Permission::create(['name' => 'create city']);
        $permission_read_city = Permission::create(['name' => 'read city']);
        $permission_update_city = Permission::create(['name' => 'update city']);
        $permission_delete_city = Permission::create(['name' => 'delete city']);

        $permission_admin = [
            $permission_create_role, $permission_read_role, $permission_update_role, $permission_delete_role,
            $permission_create_cardboard, $permission_buy_cardboard, $permission_sell_cardboard, $permission_read_cardboard, $permission_update_cardboard, $permission_delete_cardboard,
            $permission_create_country, $permission_read_country, $permission_update_country, $permission_delete_country,
            $permission_create_state, $permission_read_state, $permission_update_state, $permission_delete_state,
            $permission_create_city, $permission_read_city, $permission_update_city, $permission_delete_city
        ];

        $permission_advanced = [
            $permission_create_cardboard, $permission_buy_cardboard, $permission_sell_cardboard, $permission_read_cardboard, $permission_update_cardboard, $permission_delete_cardboard,
            $permission_create_country, $permission_read_country, $permission_update_country, $permission_delete_country,
            $permission_create_state, $permission_read_state, $permission_update_state, $permission_delete_state,
            $permission_create_city, $permission_read_city, $permission_update_city, $permission_delete_city
        ];

        $permission_agent = [
            $permission_sell_cardboard, $permission_read_cardboard
        ];

        $permission_guest = [
            $permission_buy_cardboard, $permission_read_cardboard
        ];

        $role_admin->syncPermissions($permission_admin);
        $role_advanced->syncPermissions($permission_advanced);
        $role_agent->syncPermissions($permission_agent);
        $role_guest->syncPermissions($permission_guest);
    }
}
