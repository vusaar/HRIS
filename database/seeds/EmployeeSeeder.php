<?php

use App\Contract;
use App\DepartmentJobtitle;
use App\Employee;
use App\Employmentdetail;
use Illuminate\Database\Seeder;
//use Faker;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

         $faker = Faker\Factory::create();


        //  /*
        //    CEO employee
        // */

         $emp_no = Employee::nextEmployeeNumber();

        Employee::firstOrCreate([
            'employeeid' => $emp_no,
            'nationalid' => rand(1000000,2000000),
            'title' => 'Mr',
            'surname' => $faker->lastName ,
            'middlenames' => '',
            'forenames' =>$faker->firstName,
            'dateofbirth'=>$faker->date(),
            'placeofbirth'=>$faker->city,
            'sex'=>'Male',
            'maritalstatus'=>'Married',
            'nationality'=>$faker->country,
            'religion'=>'Christian',
            'postaladd1'=>$faker->streetAddress,
            'postaladd2'=>$faker->city,
            'cellphone'=>$faker->phoneNumber,
            'emailaddress'=>$faker->email,
            'bankname'=>'',
            'accountnumber'=>''

        ]);

        Employmentdetail::firstOrCreate([
            'employeeid' => $emp_no,
            'departmentjobtitle_id'=>DepartmentJobtitle::whereHas('jobtitle',function($q){$q->where('jobtitlename','Chief Executive Officer');})->first()->id,
             'contract_id'=>Contract::where('contract_name','PERMANENT')->first()->id,
             'employmentstatus'=>'EMPLOYED',
             'dateassummed' => date('Y-m-d H:i:s'),
             'effectivedate' => date('Y-m-d H:i:s')

        ]);


        //  /*
        //    FIN DIR employee
        // */

        $emp_no = Employee::nextEmployeeNumber();

        Employee::firstOrCreate([
            'employeeid' => $emp_no,
            'nationalid' => rand(1000000,2000000),
            'title' => 'Mr',
            'surname' => $faker->lastName ,
            'middlenames' => '',
            'forenames' =>$faker->firstName,
            'dateofbirth'=>$faker->date(),
            'placeofbirth'=>$faker->city,
            'sex'=>'Male',
            'maritalstatus'=>'Married',
            'nationality'=>$faker->country,
            'religion'=>'Christian',
            'postaladd1'=>$faker->streetAddress,
            'postaladd2'=>$faker->city,
            'cellphone'=>$faker->phoneNumber,
            'emailaddress'=>$faker->email,
            'bankname'=>'',
            'accountnumber'=>''

        ]);

        Employmentdetail::firstOrCreate([
            'employeeid' => $emp_no,
            'departmentjobtitle_id'=>DepartmentJobtitle::whereHas('jobtitle',function($q){$q->where('jobtitlename','Finance Director');})->first()->id,
             'contract_id'=>Contract::where('contract_name','PERMANENT')->first()->id,
             'employmentstatus'=>'EMPLOYED',
             'dateassummed' => date('Y-m-d H:i:s'),
             'effectivedate' => date('Y-m-d H:i:s')

        ]);


        // /*
        //    ICT Director
        // */


        $emp_no = Employee::nextEmployeeNumber();

        Employee::firstOrCreate([
            'employeeid' => $emp_no,
            'nationalid' => rand(1000000,2000000),
            'title' => 'Mr',
            'surname' => $faker->lastName ,
            'middlenames' => '',
            'forenames' =>$faker->firstName,
            'dateofbirth'=>$faker->date(),
            'placeofbirth'=>$faker->city,
            'sex'=>'Male',
            'maritalstatus'=>'Married',
            'nationality'=>$faker->country,
            'religion'=>'Christian',
            'postaladd1'=>$faker->streetAddress,
            'postaladd2'=>$faker->city,
            'cellphone'=>$faker->phoneNumber,
            'emailaddress'=>$faker->email,
            'bankname'=>'',
            'accountnumber'=>''

        ]);

        Employmentdetail::firstOrCreate([
            'employeeid' => $emp_no,
            'departmentjobtitle_id'=>DepartmentJobtitle::whereHas('jobtitle',function($q){$q->where('jobtitlename','Information Communication Technology Director');})->first()->id,
             'contract_id'=>Contract::where('contract_name','PERMANENT')->first()->id,
             'employmentstatus'=>'EMPLOYED',
             'dateassummed' => date('Y-m-d H:i:s'),
             'effectivedate' => date('Y-m-d H:i:s')

        ]);


         /*
            HR Director
         */

        


        $emp_no = Employee::nextEmployeeNumber();

        Employee::firstOrCreate([
            'employeeid' => $emp_no,
            'nationalid' => rand(1000000,2000000),
            'title' => 'Mr',
            'surname' => $faker->lastName ,
            'middlenames' => '',
            'forenames' =>$faker->firstName,
            'dateofbirth'=>$faker->date(),
            'placeofbirth'=>$faker->city,
            'sex'=>'Male',
            'maritalstatus'=>'Married',
            'nationality'=>$faker->country,
            'religion'=>'Christian',
            'postaladd1'=>$faker->streetAddress,
            'postaladd2'=>$faker->city,
            'cellphone'=>$faker->phoneNumber,
            'emailaddress'=>$faker->email,
            'bankname'=>'',
            'accountnumber'=>''

        ]);

        Employmentdetail::firstOrCreate([
            'employeeid' => $emp_no,
            'departmentjobtitle_id'=>DepartmentJobtitle::whereHas('jobtitle',function($q){$q->where('jobtitlename','Human Resource Director');})->first()->id,
             'contract_id'=>Contract::where('contract_name','PERMANENT')->first()->id,
             'employmentstatus'=>'EMPLOYED',
             'dateassummed' => date('Y-m-d H:i:s'),
             'effectivedate' => date('Y-m-d H:i:s')

        ]);


        //   /* 
        //      SW manager
        //   */

          $emp_no = Employee::nextEmployeeNumber();

        Employee::firstOrCreate([
            'employeeid' => $emp_no,
            'nationalid' => rand(1000000,2000000),
            'title' => 'Mr',
            'surname' => $faker->lastName ,
            'middlenames' => '',
            'forenames' =>$faker->firstName,
            'dateofbirth'=>$faker->date(),
            'placeofbirth'=>$faker->city,
            'sex'=>'Male',
            'maritalstatus'=>'Married',
            'nationality'=>$faker->country,
            'religion'=>'Christian',
            'postaladd1'=>$faker->streetAddress,
            'postaladd2'=>$faker->city,
            'cellphone'=>$faker->phoneNumber,
            'emailaddress'=>$faker->email,
            'bankname'=>'',
            'accountnumber'=>''

        ]);

        Employmentdetail::firstOrCreate([
            'employeeid' => $emp_no,
            'departmentjobtitle_id'=>DepartmentJobtitle::whereHas('jobtitle',function($q){$q->where('jobtitlename','Software Development Manager');})->first()->id,
             'contract_id'=>Contract::where('contract_name','PERMANENT')->first()->id,
             'employmentstatus'=>'EMPLOYED',
             'dateassummed' => date('Y-m-d H:i:s'),
             'effectivedate' => date('Y-m-d H:i:s')

        ]);


        // /*
        //     Accountant
        // */

        $emp_no = Employee::nextEmployeeNumber();

        Employee::firstOrCreate([
            'employeeid' => $emp_no,
            'nationalid' => rand(1000000,2000000),
            'title' => 'Mr',
            'surname' => $faker->lastName ,
            'middlenames' => '',
            'forenames' =>$faker->firstName,
            'dateofbirth'=>$faker->date(),
            'placeofbirth'=>$faker->city,
            'sex'=>'Male',
            'maritalstatus'=>'Married',
            'nationality'=>$faker->country,
            'religion'=>'Christian',
            'postaladd1'=>$faker->streetAddress,
            'postaladd2'=>$faker->city,
            'cellphone'=>$faker->phoneNumber,
            'emailaddress'=>$faker->email,
            'bankname'=>'',
            'accountnumber'=>''

        ]);

        Employmentdetail::firstOrCreate([
            'employeeid' => $emp_no,
            'departmentjobtitle_id'=>DepartmentJobtitle::whereHas('jobtitle',function($q){$q->where('jobtitlename','Accountant');})->first()->id,
             'contract_id'=>Contract::where('contract_name','PERMANENT')->first()->id,
             'employmentstatus'=>'EMPLOYED',
             'dateassummed' => date('Y-m-d H:i:s'),
             'effectivedate' => date('Y-m-d H:i:s')

        ]);

        // /*
        //   Human Resources Officer X2
        // */

        $emp_no = Employee::nextEmployeeNumber();

        Employee::firstOrCreate([
            'employeeid' => $emp_no,
            'nationalid' => rand(1000000,2000000),
            'title' => 'Mr',
            'surname' => $faker->lastName ,
            'middlenames' => '',
            'forenames' =>$faker->firstName,
            'dateofbirth'=>$faker->date(),
            'placeofbirth'=>$faker->city,
            'sex'=>'Male',
            'maritalstatus'=>'Married',
            'nationality'=>$faker->country,
            'religion'=>'Christian',
            'postaladd1'=>$faker->streetAddress,
            'postaladd2'=>$faker->city,
            'cellphone'=>$faker->phoneNumber,
            'emailaddress'=>$faker->email,
            'bankname'=>'',
            'accountnumber'=>''

        ]);

        Employmentdetail::firstOrCreate([
            'employeeid' => $emp_no,
            'departmentjobtitle_id'=>DepartmentJobtitle::whereHas('jobtitle',function($q){$q->where('jobtitlename','Human Resources Officer');})->first()->id,
             'contract_id'=>Contract::where('contract_name','PERMANENT')->first()->id,
             'employmentstatus'=>'EMPLOYED',
             'dateassummed' => date('Y-m-d H:i:s'),
             'effectivedate' => date('Y-m-d H:i:s')

        ]);


        $emp_no = Employee::nextEmployeeNumber();

        Employee::firstOrCreate([
            'employeeid' => $emp_no,
            'nationalid' => rand(1000000,2000000),
            'title' => 'Mr',
            'surname' => $faker->lastName ,
            'middlenames' => '',
            'forenames' =>$faker->firstName,
            'dateofbirth'=>$faker->date(),
            'placeofbirth'=>$faker->city,
            'sex'=>'Male',
            'maritalstatus'=>'Married',
            'nationality'=>$faker->country,
            'religion'=>'Christian',
            'postaladd1'=>$faker->streetAddress,
            'postaladd2'=>$faker->city,
            'cellphone'=>$faker->phoneNumber,
            'emailaddress'=>$faker->email,
            'bankname'=>'',
            'accountnumber'=>''

        ]);

        Employmentdetail::firstOrCreate([
            'employeeid' => $emp_no,
            'departmentjobtitle_id'=>DepartmentJobtitle::whereHas('jobtitle',function($q){$q->where('jobtitlename','Human Resources Officer');})->first()->id,
             'contract_id'=>Contract::where('contract_name','PERMANENT')->first()->id,
             'employmentstatus'=>'EMPLOYED',
             'dateassummed' => date('Y-m-d H:i:s'),
             'effectivedate' => date('Y-m-d H:i:s')

        ]);


        // /*
        //     Software Engineer X2
        // */


        $emp_no = Employee::nextEmployeeNumber();

        Employee::firstOrCreate([
            'employeeid' => $emp_no,
            'nationalid' => rand(1000000,2000000),
            'title' => 'Mr',
            'surname' => $faker->lastName ,
            'middlenames' => '',
            'forenames' =>$faker->firstName,
            'dateofbirth'=>$faker->date(),
            'placeofbirth'=>$faker->city,
            'sex'=>'Male',
            'maritalstatus'=>'Married',
            'nationality'=>$faker->country,
            'religion'=>'Christian',
            'postaladd1'=>$faker->streetAddress,
            'postaladd2'=>$faker->city,
            'cellphone'=>$faker->phoneNumber,
            'emailaddress'=>$faker->email,
            'bankname'=>'',
            'accountnumber'=>''

        ]);

        Employmentdetail::firstOrCreate([
            'employeeid' => $emp_no,
            'departmentjobtitle_id'=>DepartmentJobtitle::whereHas('jobtitle',function($q){$q->where('jobtitlename','Software Engineer');})->first()->id,
             'contract_id'=>Contract::where('contract_name','PERMANENT')->first()->id,
             'employmentstatus'=>'EMPLOYED',
             'dateassummed' => date('Y-m-d H:i:s'),
             'effectivedate' => date('Y-m-d H:i:s')

        ]);



        $emp_no = Employee::nextEmployeeNumber();

        Employee::firstOrCreate([
            'employeeid' => $emp_no,
            'nationalid' => rand(1000000,2000000),
            'title' => 'Mr',
            'surname' => $faker->lastName ,
            'middlenames' => '',
            'forenames' =>$faker->firstName,
            'dateofbirth'=>$faker->date(),
            'placeofbirth'=>$faker->city,
            'sex'=>'Male',
            'maritalstatus'=>'Married',
            'nationality'=>$faker->country,
            'religion'=>'Christian',
            'postaladd1'=>$faker->streetAddress,
            'postaladd2'=>$faker->city,
            'cellphone'=>$faker->phoneNumber,
            'emailaddress'=>$faker->email,
            'bankname'=>'',
            'accountnumber'=>''

        ]);

        Employmentdetail::firstOrCreate([
            'employeeid' => $emp_no,
            'departmentjobtitle_id'=>DepartmentJobtitle::whereHas('jobtitle',function($q){$q->where('jobtitlename','Software Engineer');})->first()->id,
             'contract_id'=>Contract::where('contract_name','PERMANENT')->first()->id,
             'employmentstatus'=>'EMPLOYED',
             'dateassummed' => date('Y-m-d H:i:s'),
             'effectivedate' => date('Y-m-d H:i:s')

        ]);



        /*
          support technician
        */

        // $emp_no = Employee::nextEmployeeNumber();

        // Employee::firstOrCreate([
        //     'employeeid' => $emp_no,
        //     'nationalid' => rand(1000000,2000000),
        //     'title' => 'Mr',
        //     'surname' => $faker->lastName ,
        //     'middlenames' => '',
        //     'forenames' =>$faker->firstName,
        //     'dateofbirth'=>$faker->date(),
        //     'placeofbirth'=>$faker->city,
        //     'sex'=>'Male',
        //     'maritalstatus'=>'Married',
        //     'nationality'=>$faker->country,
        //     'religion'=>'Christian',
        //     'postaladd1'=>$faker->streetAddress,
        //     'postaladd2'=>$faker->city,
        //     'cellphone'=>$faker->phoneNumber,
        //     'emailaddress'=>$faker->email,
        //     'bankname'=>'',
        //     'accountnumber'=>''

        // ]);

        // Employmentdetail::firstOrCreate([
        //     'employeeid' => $emp_no,
        //     'departmentjobtitle_id'=>DepartmentJobtitle::whereHas('jobtitle',function($q){$q->where('jobtitlename','Support Technician');})->first()->id,
        //      'contract_id'=>Contract::where('contract_name','PERMANENT')->first()->id,
        //      'employmentstatus'=>'EMPLOYED',
        //      'dateassummed' => date('Y-m-d H:i:s'),
        //      'effectivedate' => date('Y-m-d H:i:s')

        // ]);


        // $emp_no = Employee::nextEmployeeNumber();

        // Employee::firstOrCreate([
        //     'employeeid' => $emp_no,
        //     'nationalid' => rand(1000000,2000000),
        //     'title' => 'Mr',
        //     'surname' => $faker->lastName ,
        //     'middlenames' => '',
        //     'forenames' =>$faker->firstName,
        //     'dateofbirth'=>$faker->date(),
        //     'placeofbirth'=>$faker->city,
        //     'sex'=>'Male',
        //     'maritalstatus'=>'Married',
        //     'nationality'=>$faker->country,
        //     'religion'=>'Christian',
        //     'postaladd1'=>$faker->streetAddress,
        //     'postaladd2'=>$faker->city,
        //     'cellphone'=>$faker->phoneNumber,
        //     'emailaddress'=>$faker->email,
        //     'bankname'=>'',
        //     'accountnumber'=>''

        // ]);

        // Employmentdetail::firstOrCreate([
        //     'employeeid' => $emp_no,
        //     'departmentjobtitle_id'=>DepartmentJobtitle::whereHas('jobtitle',function($q){$q->where('jobtitlename','Support Technician');})->first()->id,
        //      'contract_id'=>Contract::where('contract_name','PERMANENT')->first()->id,
        //      'employmentstatus'=>'EMPLOYED',
        //      'dateassummed' => date('Y-m-d H:i:s'),
        //      'effectivedate' => date('Y-m-d H:i:s')

        // ]);


       /*
         salaries clerk
       */
        // $emp_no = Employee::nextEmployeeNumber();

        // Employee::firstOrCreate([
        //     'employeeid' => $emp_no,
        //     'nationalid' => rand(1000000,2000000),
        //     'title' => 'Mr',
        //     'surname' => $faker->lastName ,
        //     'middlenames' => '',
        //     'forenames' =>$faker->firstName,
        //     'dateofbirth'=>$faker->date(),
        //     'placeofbirth'=>$faker->city,
        //     'sex'=>'Male',
        //     'maritalstatus'=>'Married',
        //     'nationality'=>$faker->country,
        //     'religion'=>'Christian',
        //     'postaladd1'=>$faker->streetAddress,
        //     'postaladd2'=>$faker->city,
        //     'cellphone'=>$faker->phoneNumber,
        //     'emailaddress'=>$faker->email,
        //     'bankname'=>'',
        //     'accountnumber'=>''

        // ]);

        // Employmentdetail::firstOrCreate([
        //     'employeeid' => $emp_no,
        //     'departmentjobtitle_id'=>DepartmentJobtitle::whereHas('jobtitle',function($q){$q->where('jobtitlename','Salaries Clerk');})->first()->id,
        //      'contract_id'=>Contract::where('contract_name','PERMANENT')->first()->id,
        //      'employmentstatus'=>'EMPLOYED',
        //      'dateassummed' => date('Y-m-d H:i:s'),
        //      'effectivedate' => date('Y-m-d H:i:s')

        // ]);


        // $emp_no = Employee::nextEmployeeNumber();

        // Employee::firstOrCreate([
        //     'employeeid' => $emp_no,
        //     'nationalid' => rand(1000000,2000000),
        //     'title' => 'Mr',
        //     'surname' => $faker->lastName ,
        //     'middlenames' => '',
        //     'forenames' =>$faker->firstName,
        //     'dateofbirth'=>$faker->date(),
        //     'placeofbirth'=>$faker->city,
        //     'sex'=>'Male',
        //     'maritalstatus'=>'Married',
        //     'nationality'=>$faker->country,
        //     'religion'=>'Christian',
        //     'postaladd1'=>$faker->streetAddress,
        //     'postaladd2'=>$faker->city,
        //     'cellphone'=>$faker->phoneNumber,
        //     'emailaddress'=>$faker->email,
        //     'bankname'=>'',
        //     'accountnumber'=>''

        // ]);

        // Employmentdetail::firstOrCreate([
        //     'employeeid' => $emp_no,
        //     'departmentjobtitle_id'=>DepartmentJobtitle::whereHas('jobtitle',function($q){$q->where('jobtitlename','Salaries Clerk');})->first()->id,
        //      'contract_id'=>Contract::where('contract_name','PERMANENT')->first()->id,
        //      'employmentstatus'=>'EMPLOYED',
        //      'dateassummed' => date('Y-m-d H:i:s'),
        //      'effectivedate' => date('Y-m-d H:i:s')

        // ]);


    //      /*
    //      Accounts Clerk
    //    */
    //     $emp_no = Employee::nextEmployeeNumber();

    //     Employee::firstOrCreate([
    //         'employeeid' => $emp_no,
    //         'nationalid' => rand(1000000,2000000),
    //         'title' => 'Mr',
    //         'surname' => $faker->lastName ,
    //         'middlenames' => '',
    //         'forenames' =>$faker->firstName,
    //         'dateofbirth'=>$faker->date(),
    //         'placeofbirth'=>$faker->city,
    //         'sex'=>'Male',
    //         'maritalstatus'=>'Married',
    //         'nationality'=>$faker->country,
    //         'religion'=>'Christian',
    //         'postaladd1'=>$faker->streetAddress,
    //         'postaladd2'=>$faker->city,
    //         'cellphone'=>$faker->phoneNumber,
    //         'emailaddress'=>$faker->email,
    //         'bankname'=>'',
    //         'accountnumber'=>''

    //     ]);

    //     Employmentdetail::firstOrCreate([
    //         'employeeid' => $emp_no,
    //         'departmentjobtitle_id'=>DepartmentJobtitle::whereHas('jobtitle',function($q){$q->where('jobtitlename','Accounts Clerk');})->first()->id,
    //          'contract_id'=>Contract::where('contract_name','PERMANENT')->first()->id,
    //          'employmentstatus'=>'EMPLOYED',
    //          'dateassummed' => date('Y-m-d H:i:s'),
    //          'effectivedate' => date('Y-m-d H:i:s')

    //     ]);


    //     $emp_no = Employee::nextEmployeeNumber();

    //     Employee::firstOrCreate([
    //         'employeeid' => $emp_no,
    //         'nationalid' => rand(1000000,2000000),
    //         'title' => 'Mr',
    //         'surname' => $faker->lastName ,
    //         'middlenames' => '',
    //         'forenames' =>$faker->firstName,
    //         'dateofbirth'=>$faker->date(),
    //         'placeofbirth'=>$faker->city,
    //         'sex'=>'Male',
    //         'maritalstatus'=>'Married',
    //         'nationality'=>$faker->country,
    //         'religion'=>'Christian',
    //         'postaladd1'=>$faker->streetAddress,
    //         'postaladd2'=>$faker->city,
    //         'cellphone'=>$faker->phoneNumber,
    //         'emailaddress'=>$faker->email,
    //         'bankname'=>'',
    //         'accountnumber'=>''

    //     ]);

    //     Employmentdetail::firstOrCreate([
    //         'employeeid' => $emp_no,
    //         'departmentjobtitle_id'=>DepartmentJobtitle::whereHas('jobtitle',function($q){$q->where('jobtitlename','Accounts Clerk');})->first()->id,
    //          'contract_id'=>Contract::where('contract_name','PERMANENT')->first()->id,
    //          'employmentstatus'=>'EMPLOYED',
    //          'dateassummed' => date('Y-m-d H:i:s'),
    //          'effectivedate' => date('Y-m-d H:i:s')

    //     ]);

    }
}
