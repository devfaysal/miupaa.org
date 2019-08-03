<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('member_id');
            $table->string('for');
            $table->string('amount');
            $table->date('date');
            $table->date('payment_date');
            $table->string('payment_method');
            $table->string('payment_reference')->nullable();
            $table->unsignedBigInteger('updated_by_id')->nullable();
            $table->boolean('status')->default(false);
            $table->timestamps();

            $table->foreign('member_id')->references('id')->on('members');
            $table->foreign('updated_by_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
