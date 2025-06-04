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
        Schema::create('badges', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('description')->nullable();
        $table->string('image_name'); // e.g., '1.png', '2.png'
        $table->string('type'); // e.g. 'check_in', 'streak', 'login', 'quit_date_set', 'active_on_quit_date'
        $table->integer('requirement'); // e.g. 10 check-ins or 3 streaks
        $table->timestamps();
    });

    DB::table('badges')->insert([
    [
        'name' => 'Welcome Aboard!',
        'description' => 'Awarded for signing up or first time login.',
        'image_name' => '1.svg',
        'type' => 'login',
        'requirement' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Quit Date Ready!',
        'description' => 'Awarded after setting your quit date.',
        'image_name' => '2.svg',
        'type' => 'quit_date_set',
        'requirement' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => '6-Month Journey',
        'description' => 'Awarded for using the app for 6 months.',
        'image_name' => '3.svg',
        'type' => 'login_duration',
        'requirement' => 180, // days since first login
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'You Made It!',
        'description' => 'Awarded for reaching your quit date while still using the app.',
        'image_name' => '4.svg',
        'type' => 'active_on_quit_date',
        'requirement' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => '7 Check-Ins',
        'description' => 'Check in 7 times.',
        'image_name' => '5.svg',
        'type' => 'check_in',
        'requirement' => 7,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => '14 Check-Ins',
        'description' => 'Check in 14 times.',
        'image_name' => '6.svg',
        'type' => 'check_in',
        'requirement' => 14,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => '21 Check-Ins',
        'description' => 'Check in 21 times.',
        'image_name' => '7.svg',
        'type' => 'check_in',
        'requirement' => 21,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => '4th Streak',
        'description' => 'Maintain a 7-day streak 4 times.',
        'image_name' => '8.svg',
        'type' => 'streak',
        'requirement' => 4,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => '5th Streak',
        'description' => 'Maintain a 7-day streak 5 times.',
        'image_name' => '9.svg',
        'type' => 'streak',
        'requirement' => 5,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => '6th Streak',
        'description' => 'Maintain a 7-day streak 6 times',
        'image_name' => '10.svg',
        'type' => 'streak',
        'requirement' => 6,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => '7th Streak',
        'description' => 'Maintain a 7-day streak 7 times',
        'image_name' => '11.svg',
        'type' => 'streak',
        'requirement' => 7,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => '8th Streak',
        'description' => 'Maintain a 7-day streak 8 times',
        'image_name' => '12.svg',
        'type' => 'streak',
        'requirement' => 8,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => '9th Streak',
        'description' => 'Maintain a 7-day streak 9 times',
        'image_name' => '13.svg',
        'type' => 'streak',
        'requirement' => 9, 
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => '10th Streak',
        'description' => 'Maintain a 7-day streak 10 times',
        'image_name' => '14.svg',
        'type' => 'streak',
        'requirement' => 10,
        'created_at' => now(),
        'updated_at' => now(),
    ],
]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('badges');
    }
};
