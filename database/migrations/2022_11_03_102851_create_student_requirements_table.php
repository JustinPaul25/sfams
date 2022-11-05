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
        Schema::create('student_requirements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->boolean('coc')->default(0);
            $table->boolean('birth_cert')->default(0);
            $table->boolean('ECCD_checklist')->default(0);
            $table->boolean('card')->default(0);
            $table->boolean('picture')->default(0);
            $table->boolean('good_moral')->default(0);
            $table->boolean('form_137')->default(0);
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('students')->onCascade('delete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_requirements');
    }
};
