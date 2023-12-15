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
        Schema::create('member_invoices', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('member_id');
            $table->string('vhoucher_no')->nullable();
            $table->date('date')->nullable();
            $table->string('name')->nullable();
            $table->string('receipt_no')->nullable();
            $table->year('year')->nullable();
            $table->integer('month')->nullable();
            $table->decimal('total_amount',10,2)->default(0)->nullable();
            $table->decimal('pay_amount',10,2)->default(0)->nullable();
            $table->integer('status')->default(0)->comment('0 pending, 1 paid, 2 partial paid');
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
        Schema::dropIfExists('member_invoices');
    }
};
