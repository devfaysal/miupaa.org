<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');

            //Personal Info
            $table->string('title')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('image')->nullable();
            $table->date('dob')->nullable();
            $table->string('blood_group');
            $table->string('gender');
            $table->string('email');
            $table->string('phone');
            $table->string('present_address');
            $table->string('permanent_address');

            //MIU Info
            $table->string('batch');
            $table->year('passing_year');
            $table->string('university_id');

            //Career Info
            $table->string('organization')->nullable();
            $table->string('designation')->nullable();
            $table->string('department')->nullable();
            $table->string('office_address')->nullable();
            $table->string('office_phone')->nullable();
            $table->string('office_email')->nullable();
            
            //Administrative
            $table->string('miupaa_number')->nullable();
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('members');
    }
}
