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
       Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('username')->unique();
    $table->string('email')->unique();
    $table->string('phone');
    $table->string('role');
    $table->timestamp('email_verified_at')->nullable();
    $table->string('password');
    $table->string('remember_token', 100)->nullable();
    $table->boolean('is_read')->default(false)->nullable();
$table->foreignId('school_id')->nullable()->constrained('schools')->onDelete('set null');
$table->foreignId('clinic_id')->nullable()->constrained('clinics')->onDelete('set null');

    $table->timestamps(); // created_at, updated_at
});

DB::table('users')->insert([
    [
        'name' => 'Admin KP Seksyen 19',
        'username' => 'admin_kp19',
        'email' => 'admin1@gmail.com',
        'phone' => '0123456789',
        'role' => 'Admin',
        'password' => bcrypt('abc123'), // bcrypt password
        'remember_token' => null,
        'email_verified_at' => now(),
        'is_read' => null,
        'school_id' => null,
        'clinic_id' => 6,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Admin KP Sri Kembangan',
        'username' => 'admin_kpsk',
        'email' => 'admin2@gmail.com',
        'phone' => '0198765432',
        'role' => 'Admin',
        'password' => bcrypt('abc123'), // bcrypt password
        'remember_token' => null,
        'email_verified_at' => now(),
        'is_read' => false,
        'school_id' => null,
        'clinic_id' => 7,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'User Alam Megah',
        'username' => 'user_megah',
        'email' => 'user1@gmail.com',
        'phone' => '0171234567',
        'role' => 'User',
        'password' => bcrypt('abc123'), // bcrypt password
        'remember_token' => null,
        'email_verified_at' => now(),
        'is_read' => false,
        'school_id' => 56, // SMK Alam Megah
        'clinic_id' => null,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'User Seri Kembangan',
        'username' => 'user_skbg',
        'email' => 'user2@gmail.com',
        'phone' => '0186543210',
        'role' => 'User',
        'password' => bcrypt('abc123'), // bcrypt password
        'remember_token' => null,
        'email_verified_at' => now(),
        'is_read' => false,
        'school_id' => 66, // SMK Seri Kembangan
        'clinic_id' => null,
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
        Schema::dropIfExists('users');
    }
};
