<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Super-Admin Roles

        $superAdmin=Role::query()->create([
            'title'=>'super-admin',
        ]);

        $superAdmin->permissions()->attach(Permission::all());


        Role::query()->insert([
            'title'=>'normal-user',
        ]);
    }
}
