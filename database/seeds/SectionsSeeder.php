<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Section;

class SectionsSeeder extends Seeder
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


        Section::firstOrCreate([
            'sectionname' => 'CEO OFFICE',
            'sectioncode' => 'C0'
        ]);

        Section::firstOrCreate([
            'sectionname' => 'FINANCE',
            'sectioncode' => 'FIN'
        ]);

        Section::firstOrCreate([
            'sectionname' => 'HUMAN RESOURCES',
            'sectioncode' => 'HR'
        ]);

        Section::firstOrCreate([
            'sectionname' => 'INFORMATION COMMUNICATION TECHNOLOGY',
            'sectioncode' => 'ICT'
        ]);


       

    }
}
