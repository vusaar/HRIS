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
            $table->unsignedBigInteger('departmentjobtitle_id')->nullable(false);
            $table->unsignedBigInteger('contract_id');
            $table->string('employmentstatus');
            $table->date('dateassummed');
            $table->date('effectivedate');
            $table->date('resignationdate');
            $table->timestamps();


            $table->foreign('employeeid')->references('employeeid')->on('tblemployee')->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('departmentjobtitle_id')->references('id')->on('tbldepartmentjobtitle')->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('contract_id')->references('id')->on('tblcontract')->onUpdate('cascade')->onDelete('restrict');
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
