<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Contract;

class ContractsSeeder extends Seeder
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

        Contract::firstOrCreate([
            'contract_name' => 'PERMANENT',
            'contract_type' => 'PERMANENT'
        ]);

        Contract::firstOrCreate([
            'contract_name' => 'CONTRACT',
            'contract_type' => 'TEMPORARY'
        ]);


       

    }
}
