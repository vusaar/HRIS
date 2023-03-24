<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Jobtitle;

class JobtitlesSeeder extends Seeder
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

        Jobtitle::firstOrCreate([
            'jobtitlename' => 'Chief Executive Officer',
            'jobtitlecode' => 'CEO'
        ]);

        Jobtitle::firstOrCreate([
            'jobtitlename' => 'Finance Director',
            'jobtitlecode' => 'FD'
        ]);

        Jobtitle::firstOrCreate([
            'jobtitlename' => 'Accountant',
            'jobtitlecode' => 'ACC'
        ]);


        Jobtitle::firstOrCreate([
            'jobtitlename' => 'Accounts Clerk',
            'jobtitlecode' => 'AC'
        ]);

       

        Jobtitle::firstOrCreate([
            'jobtitlename' => 'Human Resource Director',
            'jobtitlecode' => 'HRD'
        ]);

        Jobtitle::firstOrCreate([
            'jobtitlename' => 'Human Resources Officer',
            'jobtitlecode' => 'HRO'
        ]);


        Jobtitle::firstOrCreate([
            'jobtitlename' => 'Salaries Officer',
            'jobtitlecode' => 'SO'
        ]);


        Jobtitle::firstOrCreate([
            'jobtitlename' => 'Salaries Clerk',
            'jobtitlecode' => 'SC'
        ]);


        Jobtitle::firstOrCreate([
            'jobtitlename' => 'Information Communication Technology Director',
            'jobtitlecode' => 'ICTD'
        ]);

        Jobtitle::firstOrCreate([
            'jobtitlename' => 'Network Manager',
            'jobtitlecode' => 'NM'
        ]);

        Jobtitle::firstOrCreate([
            'jobtitlename' => 'Network Engineer',
            'jobtitlecode' => 'NE'
        ]);

        Jobtitle::firstOrCreate([
            'jobtitlename' => 'Network Technician',
            'jobtitlecode' => 'NT'
        ]);


        Jobtitle::firstOrCreate([
            'jobtitlename' => 'Software Development Manager',
            'jobtitlecode' => 'SDM'
        ]);

        Jobtitle::firstOrCreate([
            'jobtitlename' => 'Software Engineer',
            'jobtitlecode' => 'SE'
        ]);

        Jobtitle::firstOrCreate([
            'jobtitlename' => 'Support Technician',
            'jobtitlecode' => 'ST'
        ]);

    }
}
