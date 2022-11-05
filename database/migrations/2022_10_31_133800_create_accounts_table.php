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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->decimal('back_account', 10, 2)->nullable();
            $table->decimal('entrance', 10, 2)->nullable();
            $table->decimal('misc', 10, 2)->nullable();
            $table->decimal('tuition', 10, 2)->nullable();
            $table->decimal('books', 10, 2)->nullable();
            $table->decimal('handbook', 10, 2)->nullable();
            $table->decimal('id_fee', 10, 2)->nullable();
            $table->decimal('closing', 10, 2)->nullable();
            $table->decimal('graduation', 10, 2)->nullable();
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
        Schema::dropIfExists('accounts');
    }
};
