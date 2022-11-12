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
        Schema::create('branch_utilities', function (Blueprint $table) {
            $table->id();
            $table->decimal('renewal', 10, 2)->nullable();
            $table->decimal('royalty', 10, 2)->nullable();
            $table->decimal('per_student', 10, 2)->nullable();
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
        Schema::dropIfExists('branch_utilities');
    }
};
