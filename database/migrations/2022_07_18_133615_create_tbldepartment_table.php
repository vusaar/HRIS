<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbldepartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbldepartment', function (Blueprint $table) {
            $table->bigIncrements('id');            
            $table->string('departmentcode')->unique();
            $table->string('sectioncode')->nullable(false);
            $table->string('departmentname')->unique();
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
        Schema::dropIfExists('tbldepartment');
    }
}
