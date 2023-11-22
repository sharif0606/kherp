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
        Schema::table('our_members', function (Blueprint $table) {
            $table->text('nid')->after('national_id')->nullable();
            $table->text('passport')->after('passport_no')->nullable();
            $table->text('etin')->after('e_tin_number')->nullable();
            $table->text('postalCode')->after('post_office')->nullable();
            $table->text('district')->after('postalCode')->nullable();
            $table->text('country')->after('district')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('our_members', function (Blueprint $table) {
            $table->dropColumn('nid');
            $table->dropColumn('passport');
            $table->dropColumn('etin');
            $table->dropColumn('postalCode');
            $table->dropColumn('district');
            $table->dropColumn('country');
        });
    }
};
