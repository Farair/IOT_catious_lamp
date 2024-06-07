<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveEmployeeIdFromTasksTable extends Migration
{
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign(['employee_id']); // Először távolítsd el az idegen kulcsot
            $table->dropColumn('employee_id'); // Ezután távolítsd el az oszlopot
        });
    }

    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->unsignedBigInteger('employee_id')->nullable()->after('id');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }
}

