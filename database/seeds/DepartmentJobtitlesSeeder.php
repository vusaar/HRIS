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
use Illuminate\Database\Eloquent\Builder;

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
            CEO
        */

        DepartmentJobtitle::firstOrCreate([
            'grade_id' => Employeegrade::where('grade','1')->first()->id,
            'department_id' => NULL,
            'section_id' => Section::where('sectionname','CEO OFFICE')->first()->id,
            'jobtitle_id' => Jobtitle::where('jobtitlename','Chief Executive Officer')->first()->id,
            'departmentjobtitlename' => '',
            'supervisor_id' =>null
        ]);


         /*
            Finance section    
         */
        DepartmentJobtitle::firstOrCreate([
            'grade_id' => Employeegrade::where('grade','2')->first()->id,
            'department_id' => null,
            'section_id' => Section::where('sectionname','FINANCE')->first()->id,
            'jobtitle_id' => Jobtitle::where('jobtitlename','Finance Director')->first()->id,
            'departmentjobtitlename' => '',
            'supervisor_id' => DepartmentJobtitle::whereHas('jobtitle', function(Builder $query){$query->where('jobtitlename','Chief Executive Officer');})->first()->id
        ]);


        DepartmentJobtitle::firstOrCreate([
            'grade_id' => Employeegrade::where('grade','4')->first()->id,
            'department_id' => Department::where('departmentname','ACCOUNTING')->first()->id,
            'section_id' => Section::where('sectionname','FINANCE')->first()->id,
            'jobtitle_id' => Jobtitle::where('jobtitlename','Accountant')->first()->id,
            'departmentjobtitlename' => '',
            'supervisor_id' => DepartmentJobtitle::whereHas('jobtitle', function(Builder $query){$query->where('jobtitlename','Finance Director');})->first()->id
        ]);

        DepartmentJobtitle::firstOrCreate([
            'grade_id' => Employeegrade::where('grade','7')->first()->id,
            'department_id' => Department::where('departmentname','ACCOUNTING')->first()->id,
            'section_id' => Section::where('sectionname','FINANCE')->first()->id,
            'jobtitle_id' => Jobtitle::where('jobtitlename','Accounts Clerk')->first()->id,
            'departmentjobtitlename' => '',
            'supervisor_id' => DepartmentJobtitle::whereHas('jobtitle', function(Builder $query){$query->where('jobtitlename','Finance Director');})->first()->id
        ]);

        DepartmentJobtitle::firstOrCreate([
            'grade_id' => Employeegrade::where('grade','7')->first()->id,
            'department_id' => Department::where('departmentname','SALARIES')->first()->id,
            'section_id' => Section::where('sectionname','FINANCE')->first()->id,
            'jobtitle_id' => Jobtitle::where('jobtitlename','Salaries Officer')->first()->id,
            'departmentjobtitlename' => '',
            'supervisor_id' => DepartmentJobtitle::whereHas('jobtitle', function(Builder $query){$query->where('jobtitlename','Finance Director');})->first()->id
        ]);


        /*
          IT section
        */
        DepartmentJobtitle::firstOrCreate([
            'grade_id' => Employeegrade::where('grade','3')->first()->id,
            'department_id' => null,
            'section_id' => Section::where('sectionname','INFORMATION COMMUNICATION TECHNOLOGY')->first()->id,
            'jobtitle_id' => Jobtitle::where('jobtitlename','Information Communication Technology Director')->first()->id,
            'departmentjobtitlename' => '',
            'supervisor_id' => DepartmentJobtitle::whereHas('jobtitle', function(Builder $query){$query->where('jobtitlename','Chief Executive Officer');})->first()->id
        ]);



        DepartmentJobtitle::firstOrCreate([
            'grade_id' => Employeegrade::where('grade','5')->first()->id,
            'department_id' => Department::where('departmentname','SOFTWARE DEVELOPMENT')->first()->id,
            'section_id' => Section::where('sectionname','INFORMATION COMMUNICATION TECHNOLOGY')->first()->id,
            'jobtitle_id' => Jobtitle::where('jobtitlename','Software Development Manager')->first()->id,
            'departmentjobtitlename' => '',
            'supervisor_id' => DepartmentJobtitle::whereHas('jobtitle', function(Builder $query){$query->where('jobtitlename','Information Communication Technology Director');})->first()->id
        ]);

        DepartmentJobtitle::firstOrCreate([
            'grade_id' => Employeegrade::where('grade','6')->first()->id,
            'department_id' => Department::where('departmentname','SOFTWARE DEVELOPMENT')->first()->id,
            'section_id' => Section::where('sectionname','INFORMATION COMMUNICATION TECHNOLOGY')->first()->id,
            'jobtitle_id' => Jobtitle::where('jobtitlename','Software Engineer')->first()->id,
            'departmentjobtitlename' => '',
            'supervisor_id' => DepartmentJobtitle::whereHas('jobtitle', function(Builder $query){$query->where('jobtitlename','Software Development Manager');})->first()->id
        ]);

        DepartmentJobtitle::firstOrCreate([
            'grade_id' => Employeegrade::where('grade','7')->first()->id,
            'department_id' => Department::where('departmentname','SOFTWARE DEVELOPMENT')->first()->id,
            'section_id' => Section::where('sectionname','INFORMATION COMMUNICATION TECHNOLOGY')->first()->id,
            'jobtitle_id' => Jobtitle::where('jobtitlename','Software Engineer')->first()->id,
            'departmentjobtitlename' => '',
            'supervisor_id' => DepartmentJobtitle::whereHas('jobtitle', function(Builder $query){$query->where('jobtitlename','Software Development Manager');})->first()->id
        ]);


        DepartmentJobtitle::firstOrCreate([
            'grade_id' => Employeegrade::where('grade','5')->first()->id,
            'department_id' => Department::where('departmentname','INFORMATION TECHNOLOGY HARDWARE AND INFRASTRUCTURE')->first()->id,
            'section_id' => Section::where('sectionname','INFORMATION COMMUNICATION TECHNOLOGY')->first()->id,
            'jobtitle_id' => Jobtitle::where('jobtitlename','Network Manager')->first()->id,
            'departmentjobtitlename' => '',
            'supervisor_id' => DepartmentJobtitle::whereHas('jobtitle', function(Builder $query){$query->where('jobtitlename','Information Communication Technology Director');})->first()->id
        ]);



        DepartmentJobtitle::firstOrCreate([
            'grade_id' => Employeegrade::where('grade','6')->first()->id,
            'department_id' => Department::where('departmentname','INFORMATION TECHNOLOGY HARDWARE AND INFRASTRUCTURE')->first()->id,
            'section_id' => Section::where('sectionname','INFORMATION COMMUNICATION TECHNOLOGY')->first()->id,
            'jobtitle_id' => Jobtitle::where('jobtitlename','Network Engineer')->first()->id,
            'departmentjobtitlename' => '',
            'supervisor_id' => DepartmentJobtitle::whereHas('jobtitle', function(Builder $query){$query->where('jobtitlename','Network Manager');})->first()->id
        ]);


        /*
          HR section
        */
        DepartmentJobtitle::firstOrCreate([
            'grade_id' => Employeegrade::where('grade','3')->first()->id,
            'department_id' => null,
            'section_id' => Section::where('sectionname','HUMAN RESOURCES')->first()->id,
            'jobtitle_id' => Jobtitle::where('jobtitlename','Human Resource Director')->first()->id,
            'departmentjobtitlename' => '',
            'supervisor_id' => DepartmentJobtitle::whereHas('jobtitle', function(Builder $query){$query->where('jobtitlename','Chief Executive Officer');})->first()->id
        ]);



        DepartmentJobtitle::firstOrCreate([
            'grade_id' => Employeegrade::where('grade','6')->first()->id,
            'department_id' => Department::where('departmentname','HUMAN RESOURCE LEGAL AFFAIRS')->first()->id,
            'section_id' => Section::where('sectionname','HUMAN RESOURCES')->first()->id,
            'jobtitle_id' => Jobtitle::where('jobtitlename','Human Resources Officer')->first()->id,
            'departmentjobtitlename' => '',
            'supervisor_id' => DepartmentJobtitle::whereHas('jobtitle', function(Builder $query){$query->where('jobtitlename','Human Resource Director');})->first()->id
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
