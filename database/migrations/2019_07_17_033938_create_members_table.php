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
            $table->string('code')->nullable();
            $table->string('name');
            $table->string('batch');
            $table->year('passing_year');
            $table->string('university_id');
            $table->string('email');
            $table->string('phone')->unique();
            $table->string('address');
            $table->string('organization')->nullable();
            $table->string('designation')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender');
            $table->string('blood_group');
            $table->string('image')->nullable();
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
