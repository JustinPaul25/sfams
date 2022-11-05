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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->unsignedBigInteger('grade_level_id')->nullable();
            $table->double('average', 5, 2);
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('students')->onCascade('delete');
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
        Schema::dropIfExists('grades');
    }
};
