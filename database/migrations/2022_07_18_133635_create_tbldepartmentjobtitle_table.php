<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbldepartmentjobtitleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbldepartmentjobtitle', function (Blueprint $table) {
            $table->bigIncrements('id');           
            $table->unsignedBigInteger('grade_id')->nullable(false);
            $table->unsignedBigInteger('jobhierarchy_id')->nullable(true);
            $table->unsignedBigInteger('department_id')->nullable(true);
            $table->unsignedBigInteger('section_id')->nullable(true);
            $table->unsignedBigInteger('jobtitle_id')->nullable(false);
            $table->string('isacademic')->nullable(true);                       
            $table->string('departmentjobtitlename')->nullable(true);
            $table->unsignedBigInteger('supervisor_id');

            $table->foreign('supervisor_id')->references('id')->on('tbldepartmentjobtitle')->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('department_id')->references('id')->on('tbldepartment')->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('jobtitle_id')->references('id')->on('tbljobtitle')->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('jobhierarchy_id')->references('id')->on('tbljobtitlehierarchy')->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('grade_id')->references('id')->on('tblemployeegrade')->onUpdate('cascade')->onDelete('restrict');
            
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
        Schema::dropIfExists('tbldepartmentjobtitle');
    }
}
