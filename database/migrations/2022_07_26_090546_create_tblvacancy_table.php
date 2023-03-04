<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblvacancyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblvacancy', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('vacancy_code')->unique();
            $table->unsignedBigInteger('departmentjobtitle_id')->nullable(false);
            $table->unsignedBigInteger('contract_id')->nullable(false);   
            
            $table->foreign('departmentjobtitle_id')->references('id')->on('tbldepartmentjobtitle')->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('contract_id')->references('id')->on('tblvacancy')->onUpdate('cascade')->onDelete('restrict');
            
            $table->string('no_of_posts');
            $table->text('job_requirements');
            $table->text('responsibilities');
            $table->text('application_requirements');
            $table->date('open_from');
            $table->date('open_until');
            $table->boolean('enabled');
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
        Schema::dropIfExists('tblvacancy');
    }
}
