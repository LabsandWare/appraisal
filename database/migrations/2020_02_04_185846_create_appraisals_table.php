<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppraisalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appraisals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('staff_id');
            $table->string('supervisor_comment');
            $table->string('employee_comment');
            $table->string('uuid');
            $table->string('supervisor_status');
            $table->string('employee_status');
            $table->string('employee_goal_points');
            $table->string('supervisor_goal_points');
            $table->string('supervisor_achievement_points');
            $table->string('employee_achievement_points');
            $table->string('supervisor_challenging_points');
            $table->string('employee_challenging_points');
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
        Schema::dropIfExists('appraisals');
    }
}
