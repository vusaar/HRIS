<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblemployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblemployee', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('employeeid')->unique();
            $table->string('nationalid')->nullable(false);
            $table->string('nssa');
            $table->string('driverslicense');
            $table->string('workpermit');
            $table->string('title');
            $table->string('surname')->nullable(false);
            $table->string('forenames')->nullable(false);
            $table->string('middlenames');
            $table->string('maidenname');
            $table->date('dateofbirth')->nullable(false);
            $table->string('placeofbirth');
            $table->string('sex')->nullable(false);
            $table->string('maritalstatus');
            $table->string('race');
            $table->string('province');
            $table->string('citizenship')->nullable(false);
            $table->string('nationality')->nullable(false);
            $table->string('religion');
            $table->string('postaladd1');
            $table->string('postaladd2');
            $table->string('postaladd3');
            $table->string('cellphone');
            $table->string('emailaddress');
            $table->string('relationship');
            $table->string('bankname');
            $table->string('accountnumber');
            $table->string('medical');
            $table->string('funeral');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblemployee');
    }
}
