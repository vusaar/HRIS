<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbljobtitleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbljobtitle', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jobtitlecode')->unique();
            /*
               job title cannot be unique because the we can have the same jobtile with both fulltime and parttime
            */
            $table->string('jobtitlename');                     
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
        Schema::dropIfExists('tbljobtitle');
    }
}
