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
        Schema::create('homestays', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('homestay_name');
            $table->decimal('homestay_price', 10, 2);
            $table->text('homestay_details')->nullable();
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->timestamps();
    
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });
        // Insert default data
        DB::table('homestays')->insert([
            ['id' => 2, 'homestay_name' => 'Homestay 1', 'homestay_price' => 121.90, 'homestay_details' => 'DWEDEWD\r\nDEWDEWDEWDEWD\r\nDEDWED', 'created_by' => 2, 'updated_by' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'homestay_name' => 'Homestay 3', 'homestay_price' => 500.00, 'homestay_details' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'created_by' => 2, 'updated_by' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'homestay_name' => 'Homestay 4', 'homestay_price' => 200.00, 'homestay_details' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'created_by' => 2, 'updated_by' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'homestay_name' => 'Package Family Day', 'homestay_price' => 1000.00, 'homestay_details' => '-\r\n-\r\n-', 'created_by' => 2, 'updated_by' => 2, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
    
    public function down()
    {
        Schema::dropIfExists('homestays');
    }
};
