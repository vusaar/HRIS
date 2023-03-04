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
            $table->string('nssa')->nullable(true);
            $table->string('driverslicense')->nullable(true);
            $table->string('workpermit')->nullable(true);
            $table->string('title');
            $table->string('surname')->nullable(false);
            $table->string('forenames')->nullable(false);
            $table->string('middlenames')->nullable(true);
            $table->string('maidenname')->nullable(true);
            $table->date('dateofbirth')->nullable(true);
            $table->string('placeofbirth')->nullable(true);
            $table->string('sex')->nullable(false);
            $table->string('maritalstatus')->nullable(true);
            $table->string('race')->nullable(true);
            $table->string('province')->nullable(true);
            $table->string('citizenship')->nullable(true);
            $table->string('nationality')->nullable(true);
            $table->string('religion')->nullable(true);
            $table->string('postaladd1')->nullable(true);
            $table->string('postaladd2')->nullable(true);
            $table->string('postaladd3')->nullable(true);
            $table->string('cellphone')->nullable(true);
            $table->string('emailaddress')->nullable(true);
            $table->string('relationship')->nullable(true);
            $table->string('bankname')->nullable(true);
            $table->string('accountnumber')->nullable(true);
            $table->string('medical')->nullable(true);
            $table->string('funeral')->nullable(true);            
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
