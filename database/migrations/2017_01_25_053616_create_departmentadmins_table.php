<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentadminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_admins', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('name');
            $table->integer('school_admin_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departmentadmins');
    }
}
