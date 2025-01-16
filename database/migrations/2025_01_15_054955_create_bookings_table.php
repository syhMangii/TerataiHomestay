<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('homestay_id')->unsigned();
            // $table->date('booking_date');
            $table->date('booking_check_in_date')->nullable(); // New
            $table->date('booking_check_out_date')->nullable(); // New
            $table->integer('booking_guest_number')->nullable(); // New
            $table->boolean('booking_is_bbq')->nullable(); // New
            // $table->text('booking_description');
            $table->decimal('booking_total_price', 8, 2);
            $table->string('booking_status');
            $table->string('booking_receipt')->nullable(); // New
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
    
            $table->foreign('homestay_id')->references('id')->on('homestays')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
