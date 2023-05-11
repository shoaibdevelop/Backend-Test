<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtraRepaymentScheduleTable extends Migration
{
    public function up()
    {
        Schema::create('extra_repayment_schedule', function (Blueprint $table) {
            $table->id();
            $table->integer('month_number');
            $table->decimal('starting_balance', 10, 2);
            $table->decimal('monthly_payment', 10, 2);
            $table->decimal('principal_component', 10, 2);
            $table->decimal('interest_component', 10, 2);
            $table->decimal('extra_repayment', 10, 2)->nullable();
            $table->decimal('ending_balance', 10, 2);
            $table->integer('remaining_loan_term');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('extra_repayment_schedule');
    }
}
