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
            $table->string('departmentjobtitlecode')->unique();
            $table->string('departmentcode')->nullable(false);
            $table->string('jobtitlecode')->nullable(false);
            $table->string('grade')->nullable(false);
            $table->string('departmentjobtitlename')->nullable(false);
            $table->string('reportsto');
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
