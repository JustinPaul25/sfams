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
        Schema::create('payment_utilities', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->decimal('entrance', 10, 2)->nullable();
            $table->decimal('misc', 10, 2)->nullable();
            $table->decimal('tuition', 10, 2)->nullable();
            $table->decimal('books', 10, 2)->nullable();
            $table->decimal('handbook', 10, 2)->nullable();
            $table->decimal('id_fee', 10, 2)->nullable();
            $table->decimal('closing', 10, 2)->nullable();
            $table->decimal('graduation', 10, 2)->nullable();
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
        Schema::dropIfExists('payment_utilities');
    }
};
