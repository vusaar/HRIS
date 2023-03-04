<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        
        Permission::create(['name' => 'super_user']);        

        Permission::create(['name' => 'create_user']);
        Permission::create(['name' => 'edit_user']);
        Permission::create(['name' => 'assign_user_roles']);
        Permission::create(['name' => 'revoke_user_roles']);

        Permission::create(['name' => 'assign_user_permissions']);
        Permission::create(['name' => 'revoke_user_permissions']);
      

        Role::create(['name' => 'super_user']);
        $super_user_role = Role::where('name','super_user')->first();
        // 

        $super_user_role->givePermissionTo('create_user');
        $super_user_role->givePermissionTo('edit_user');

        $super_user_role->givePermissionTo('assign_user_roles');
        $super_user_role->givePermissionTo('revoke_user_roles');
        $super_user_role->givePermissionTo('assign_user_permissions');
        $super_user_role->givePermissionTo('revoke_user_permissions');
         

        /*
            create a user
        */

        DB::table('users')->insert([
            'employeeid' => '0000',
            'email' => 'admin@company.com',
            'password' => Hash::make('password'),
        ]);

         /*
          assuming there only one user in the db
         */
        $super_user = User::first();

        $super_user->assignRole($super_user_role);


        /*
             create users' personal records
        */

        DB::table('tblemployee')->insert([
            'employeeid' => '0000',
            'nationalid' => '00-0000A00',
            'title' => 'Mrs',
             'nssa' => '0000',
            'surname' =>  'Admin',
            'forenames' => 'Admin',
            'sex' => 'Female'
        ]
        );

    }
}
