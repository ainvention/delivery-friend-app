<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHelpsAndWeightCoulmnsToSendingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sendings', function (Blueprint $table) {
            $table->tinyInteger('weight')->nullable();
            $table->boolean('help_pick_up')->default(false);
            $table->boolean('help_delivery')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sendings', function (Blueprint $table) {
            //
        });
    }
}
