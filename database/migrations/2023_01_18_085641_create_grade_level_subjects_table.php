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
        Schema::create('grade_level_subjects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->unsignedBigInteger('grade_level_id')->nullable();
            $table->timestamps();

            $table->foreign('branch_id')->references('id')->on('branches')->onCascade('delete');
            $table->foreign('subject_id')->references('id')->on('subjects')->onCascade('delete');
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
        Schema::dropIfExists('grade_level_subjects');
    }
};
