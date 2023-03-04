<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Employeegrade;

class EstablishmentSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        /*
            Create employee grades
        */

        Employeegrade::firstOrCreate([
            'grade' => '1',
        ]);

        Employeegrade::firstOrCreate([
            'grade' => '2',
        ]);

        Employeegrade::firstOrCreate([
            'grade' => '3',
        ]);

        Employeegrade::firstOrCreate([
            'grade' => '4',
        ]);

        Employeegrade::firstOrCreate([
            'grade' => '5',
        ]);

        Employeegrade::firstOrCreate([
            'grade' => '6',
        ]);

        Employeegrade::firstOrCreate([
            'grade' => '7',
        ]);

        Employeegrade::firstOrCreate([
            'grade' => '8',
        ]);

        Employeegrade::firstOrCreate([
            'grade' => '9',
        ]);

        Employeegrade::firstOrCreate([
            'grade' => '10',
        ]);

       

    }
}
