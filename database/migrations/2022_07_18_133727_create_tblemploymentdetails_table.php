<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblemploymentdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblemploymentdetails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('employeeid')->nullable(false);
            $table->string('departmentjobtitlecode')->nullable(false);
            $table->string('contractcode');
            $table->string('employmentstatus');
            $table->date('dateassummed');
            $table->date('effectivedate');
            $table->date('resignationdate');
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
        Schema::dropIfExists('tblemploymentdetails');
    }
}
