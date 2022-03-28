<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTableMyCourse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_course', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('user_id');
            $table->string('course_id');
            $table->string('status')->default('not');
            $table->string('payment_method')->default(null);
            $table->string('price')->default(null);
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
        //
    }
}
