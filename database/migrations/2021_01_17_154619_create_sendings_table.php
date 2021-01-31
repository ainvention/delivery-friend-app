<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSendingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sendings', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->unique();
            $table->string('photo')->nullable();
            $table->char('title', 40);
            $table->char('notes', 80)->nullable();
            $table->char('size', 10);
            $table->char('fromAddress', 80);
            $table->char('fromNotes', 80)->nullable();
            $table->decimal('fromLat', 10, 2);
            $table->decimal('fromLng', 11, 2);
            $table->char('toAddress', 80);
            $table->char('toNotes', 80)->nullable();
            $table->decimal('toLat', 10, 2);
            $table->decimal('toLng', 11, 2);
            $table->char('toDate', 15)->nullable();
            $table->date('toDateCustom')->nullable();
            $table->char('toTime', 15)->nullable();
            $table->dateTime('toTimeCustom')->nullable();
            $table->smallInteger('totalDistance');
            $table->smallInteger('recommendedCosts');
            $table->boolean('isCoupon')->default(false);
            $table->smallInteger('rewards');
            $table->smallInteger('serviceCharges');
            $table->tinyInteger('insuranceCost');
            $table->smallInteger('totalDeliveryCosts');
            $table->boolean('isFraglile')->default(false);
            $table->boolean('needAnimalCage')->default(false);
            $table->boolean('needCoolingEquipment')->default(false);
            $table->boolean('needHelpWrapping')->default(false);
            $table->softDeletesTz($column = 'deleted_at', $precision = 0);
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
        Schema::dropIfExists('sendings');
    }
}
