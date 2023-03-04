<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbljobhierarchyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbljobtitlehierarchy', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jobtitle_hierarchy')->unique()->nullable(false);           
            $table->bigInteger('hierarchy_parent');
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
        Schema::dropIfExists('tbljobhierarchy');
    }
}
