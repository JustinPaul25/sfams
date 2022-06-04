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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->enum('department', ['ELEM', 'SRH'])->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nulalble();
            $table->date('birth_date')->nullable();
            $table->string('birth_place')->nullable();
            $table->unsignedBigInteger('grade_entered_id')->nullable();
            $table->boolean('gender')->nullable();
            $table->string('phone')->nullable();
            $table->string('father_name')->nullable();
            $table->boolean('father_is_deceased')->nullable();
            $table->boolean('father_phone')->nullable();
            $table->string('mother_name')->nullable();
            $table->boolean('mother_is_deceased')->nullable();
            $table->boolean('mother_phone')->nullable();
            $table->string('guardian_name')->nullable();
            $table->boolean('guardian_phone')->nullable();
            $table->string('purok_street')->nullable();
            $table->string('barangay')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('last_school_attended')->nullable();
            $table->string('last_school_address')->nullable();
            $table->string('last_school_grade_section')->nullable();
            $table->string('last_school_school_year')->nullable();
            $table->timestamps();

            $table->foreign('grade_entered_id')->references('id')->on('grade_levels')->onCascade('delete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
