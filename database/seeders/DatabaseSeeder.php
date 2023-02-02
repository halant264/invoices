<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $role = Role::where('name' , 'Super-Admin')->first();
        $permis = Permission::all();
        // $permis->toarray();
        // $role->givePermissionTo([$permis]);
        foreach($permis as $permis1){
            $role->givePermissionTo($permis1->name);
        }
    }
}
