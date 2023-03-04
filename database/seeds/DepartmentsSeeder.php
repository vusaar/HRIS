<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Department;

class DepartmentsSeeder extends Seeder
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

        Department::firstOrCreate([
            'departmentcode' => 'ACC',
            'sectioncode' => 'FIN',
            'departmentname'=> 'ACCOUNTING'
        ]);

        Department::firstOrCreate([
            'departmentcode' => 'SAL',
            'sectioncode' => 'FIN',
            'departmentname'=> 'SALARIES'
        ]);

        Department::firstOrCreate([
            'departmentcode' => 'ITHI',
            'sectioncode' => 'ICT',
            'departmentname'=> 'INFORMATION TECHNOLOGY HARDWARE AND INFRASTRUCTURE'
        ]);

        Department::firstOrCreate([
            'departmentcode' => 'SD',
            'sectioncode' => 'ICT',
            'departmentname'=> 'SOFTWARE DEVELOPMENT'
        ]);


        Department::firstOrCreate([
            'departmentcode' => 'HRLA',
            'sectioncode' => 'HR',
            'departmentname'=> 'HUMAN RESOURCE LEGAL AFFAIRS'
        ]);

        Department::firstOrCreate([
            'departmentcode' => 'HRT',
            'sectioncode' => 'HR',
            'departmentname'=> 'HUMAN RESOURCE TRAINING'
        ]); 

    }
}
