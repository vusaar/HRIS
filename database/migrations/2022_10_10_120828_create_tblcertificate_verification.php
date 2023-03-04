<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblcertificateVerification extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblcertificate_verification', function (Blueprint $table) {
            $table->bigIncrements('id');  
            $table->unsignedBigInteger('applicant_document_id');
            $table->boolean('certificate_verified');
            $table->string('comment')->nullable(true);           
            $table->string('userid')->nullable(false);                                   
            //$table->foreign('applicant_document_id')->references('id')->on('tblapplicant_qualification_documents')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('tblcertificate_verification');
    }
}
