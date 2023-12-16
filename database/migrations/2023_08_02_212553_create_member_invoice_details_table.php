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
        Schema::create('member_invoice_details', function (Blueprint $table) {
            $table->id();
            $table->string('jv_id')->nullable();
            $table->integer('member_invoice_id');
            $table->integer('fee_category_id');
            $table->decimal('amount',10,2)->default(0)->nullable();
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
        Schema::dropIfExists('member_invoice_details');
    }
};
