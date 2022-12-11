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
        Schema::create('branch_students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->unsignedBigInteger('grade_level_id')->nullable();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->enum('status', ['OLD', 'ENROLLED'])->nullable();
            $table->unsignedBigInteger('school_year_id')->nullable();

            $table->timestamps();
            
            $table->foreign('school_year_id')->references('id')->on('school_years')->onCascade('delete');
            $table->foreign('branch_id')->references('id')->on('branches')->onCascade('delete');
            $table->foreign('grade_level_id')->references('id')->on('grade_levels')->onCascade('delete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branch_students');
    }
};
