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
        Schema::create('branch_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->decimal('back_account', 11, 2)->nullable();
            $table->decimal('renewal', 10, 2)->nullable();
            $table->decimal('royalty', 10, 2)->nullable();
            $table->decimal('per_student_total', 11, 2)->nullable();
            $table->timestamps();

            $table->foreign('branch_id')->references('id')->on('branches')->onCascade('delete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branch_accounts');
    }
};
