<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
Schema::create('clinics', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('code');
    $table->timestamps();
});

DB::table('clinics')->insert([
    ['id' => 1, 'name' => 'KP Taman Medan'],
    ['id' => 2, 'name' => 'KP Kota Damansara'],
    ['id' => 3, 'name' => 'KP Puchong Batu 14'],
    ['id' => 4, 'name' => 'KP Kelana Jaya'],
    ['id' => 5, 'name' => 'KP Seksyen 7'],
    ['id' => 6, 'name' => 'KP Seksyen 19 Shah Alam'],
    ['id' => 7, 'name' => 'KP Sri Kembangan'],
]);


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clinics');
    }
};
