<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('voucher_no');
            $table->string('current_date');
            $table->year('eyear')->nullable();
            $table->string('emonth')->nullable();
            $table->string('pay_name')->nullable();
            $table->string('purpose')->nullable();
            $table->decimal('debit_sum',10,2)->default(0);
            $table->decimal('credit_sum',10,2)->default(0);
            $table->string('cheque_no')->nullable();
            $table->string('cheque_dt')->nullable();
            $table->string('bank')->nullable();
            $table->string('slip')->nullable();
            $table->string('txnid')->nullable();
            $table->unsignedBigInteger('member_id')->nullable();

             // default
             $table->unsignedBigInteger('created_by')->index()->default(2);
             $table->unsignedBigInteger('updated_by')->index()->nullable();
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
        Schema::dropIfExists('member_vouchers');
    }
};
