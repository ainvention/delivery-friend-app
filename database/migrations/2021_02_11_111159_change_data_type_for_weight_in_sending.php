<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDataTypeForWeightInSending extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sendings', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->change();
            // $table->char('user_name', 40);
            // $table->string('photo')->nullable();
            // $table->char('title', 40);
            // $table->char('note', 80)->nullable();
            $table->unsignedSmallInteger('weight')->nullable()->change();
            // $table->char('size', 10);
            // $table->char('from_address', 80);
            // $table->char('simple_from_address', 30);
            // $table->char('from_note', 80)->nullable();
            // $table->decimal('from_lat', 18, 12);
            // $table->decimal('from_lng', 18, 12);
            // $table->char('to_address', 80);
            // $table->char('simple_to_address', 30);
            // $table->char('to_note', 80)->nullable();
            // $table->decimal('to_lat', 18, 12);
            // $table->decimal('to_lng', 18, 12);
            // $table->char('to_date', 15)->nullable();
            // $table->date('to_date_manually')->nullable();
            // $table->char('to_time', 15)->nullable();
            // $table->time('to_time_manually')->nullable();
            $table->unsignedSmallInteger('total_distance')->change();
            // $table->float('recommended_cost', 8, 2);
            // $table->char('coupon_number', 10)->nullable();
            $table->unsignedSmallInteger('coupon_price')->nullable()->change();
            // $table->tinyInteger('coupon_rate')->nullable();
            // $table->float('discounted_cost', 8, 2)->nullable();
            // $table->float('reward', 8, 2);
            // $table->float('service_charge', 8, 2);
            // $table->inyInteger('insurance_cost');
            // $table->float('total_delivery_cost', 8, 2);
            // $table->boolean('is_fraglile')->default(false);
            // $table->boolean('need_animal_cage')->default(false);
            // $table->boolean('need_cooling_equipment')->default(false);
            // $table->boolean('need_help_wrapping')->default(false);
            // $table->softDeletesTz($column = 'deleted_at', $precision = 0); //time zone
            // $table->timestamps();
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
