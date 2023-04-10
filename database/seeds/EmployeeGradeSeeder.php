<?php

use Illuminate\Database\Seeder;

use App\Employeegrade;

class EmployeeGradeSeeder extends Seeder
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
            'grade' => '1'
        ]);

        Employeegrade::firstOrCreate([
            'grade' => '2'
        ]);

        Employeegrade::firstOrCreate([
            'grade' => '3'
        ]);

        Employeegrade::firstOrCreate([
            'grade' => '4'
        ]);

       

        Employeegrade::firstOrCreate([
            'grade' => '5'
        ]);

        Employeegrade::firstOrCreate([
            'grade' => '6'
        ]);

        Employeegrade::firstOrCreate([
            'grade' => '7'
        ]);

        Employeegrade::firstOrCreate([
            'grade' => '8'
        ]);

        Employeegrade::firstOrCreate([
            'grade' => '9'
        ]);

        Employeegrade::firstOrCreate([
            'grade' => '10'
        ]);

        Employeegrade::firstOrCreate([
            'grade' => '11'
        ]);

    }
}
