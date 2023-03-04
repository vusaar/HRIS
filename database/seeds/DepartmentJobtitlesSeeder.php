<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\DepartmentJobtitle;
use App\Employeegrade;
use App\Department;
use App\Section;
use App\Jobtitle;

class DepartmentJobtitlesSeeder extends Seeder
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

        DepartmentJobtitle::firstOrCreate([
            'grade_id' => Employeegrade::where('grade','1')->first()->id,
            'department_id' => NULL,
            'section_id' => Section::where('sectionname','CEO OFFICE')->first()->id,
            'jobtitle_id' => Jobtitle::where('jobtitlename','Chief Executive Officer')->first()->id,
            'departmentjobtitlename' => '',
            'supervisor' =>1
        ]);

        // DepartmentJobtitle::firstOrCreate([
        //     'grade_id' => 'PERMANENT',
        //     'jobhierarchy_id' => 'PERMANENT',
        //     'department_id' => 'PERMANENT',
        //     'section_id' => 'PERMANENT',
        //     'jobtitle_id' => '',
        //     'departmentjobtitlename' => '',
        //     'supervisor' =>''
        // ]);


       

    }
}
