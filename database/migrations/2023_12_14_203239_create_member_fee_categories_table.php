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
        Schema::create('member_fee_categories', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('account_table_name')->nullable();
            $table->integer('account_id')->nullable();
            $table->integer('membership_type_id')->nullable();
            $table->string('purpose')->nullable();
            $table->decimal('amount',10,2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_fee_categories');
    }
};
