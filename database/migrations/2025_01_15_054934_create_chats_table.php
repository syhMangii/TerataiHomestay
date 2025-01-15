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
        Schema::create('chats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->nullable();
            $table->integer('admin_id')->nullable();
            $table->integer('sent_by')->nullable();
            $table->text('message');
            $table->timestamp('chat_created')->nullable();
            $table->timestamps();
            $table->string('first', 255)->default('N');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('chats');
    }
    
};
