<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable(); //if this coupon is given to a specific user
            $table->char('name', 10);
            $table->enum('category', ['sender', 'helper']); // range of coupon categories
            $table->char('number', 10)->unique();
            $table->smallInteger('price')->nullable();
            $table->tinyInteger('rate')->nullable();
            $table->date('expire');
            $table->date('used')->nullable();
            $table->integer('adjusted_task_id')->nullable();
            $table->softDeletesTz($column = 'deleted_at', $precision = 0); //time zone
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
        Schema::dropIfExists('coupons');
    }
}
