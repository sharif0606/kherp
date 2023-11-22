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
        Schema::create('our_members', function (Blueprint $table) {
            $table->id();
            $table->string('given_name');
            $table->string('surname');
            $table->string('member_id')->nullable();
            $table->unsignedBigInteger('role_id')->index();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('anniversary')->nullable();
            $table->string('name_of_spouse')->nullable();
            $table->string('occupation_of_spouse')->nullable();
            $table->string('birth_date')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('cell_number')->nullable();
            $table->string('tel_number')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nationality')->nullable();
            $table->string('national_id')->nullable();
            $table->string('passport_no')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('qualification')->nullable();
            $table->string('name_of_institute')->nullable();
            $table->string('e_tin_number')->nullable();
            $table->string('village')->nullable();
            $table->string('block')->nullable();
            $table->string('police_station')->nullable();
            $table->string('post_office')->nullable();
            $table->string('perVillage')->nullable();
            $table->string('perBlock')->nullable();
            $table->string('perPoliceStation')->nullable();
            $table->string('perPostOffice')->nullable();
            $table->string('perPostalCode')->nullable();
            $table->string('perDistrict')->nullable();
            $table->string('perCountry')->nullable();
            $table->string('profession')->nullable();
            $table->string('designation')->nullable();
            $table->string('company')->nullable();
            $table->string('profVillage')->nullable();
            $table->string('profBlock')->nullable();
            $table->string('profPoliceStation')->nullable();
            $table->string('profPostOffice')->nullable();
            $table->string('profPostalCode')->nullable();
            $table->string('profDistrict')->nullable();
            $table->string('profCountry')->nullable();
            $table->string('membership_applied')->nullable();
            $table->string('proposed_name')->nullable();
            $table->string('proposed_membership_id')->nullable();
            $table->string('club_designation')->nullable();
            $table->string('membership_no')->unique()->nullable();
            $table->string('image')->nullable();
            $table->integer('show_font')->default(0)->nullable();
            $table->integer('status')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('our_members');
    }
};
