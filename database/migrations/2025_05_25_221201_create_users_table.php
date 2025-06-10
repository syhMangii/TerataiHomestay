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
    $table->string('phone')->nullable(); // make it nullable
    // add age and class_name both nullable
    $table->integer('age')->nullable();
    $table->string('class_name')->nullable();
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
        'name' => 'Admin KP Taman Medan',
        'username' => 'TM_NQT',
        'email' => 'admin1@gmail.com',
        'phone' => null,
        'age' => null,
        'class_name' => null,
        'role' => 'Admin',
        'password' => bcrypt('TM46150A'),
        'remember_token' => null,
        'email_verified_at' => now(),
        'is_read' => null,
        'school_id' => null,
        'clinic_id' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Admin KP KD',
        'username' => 'KD_NQT',
        'email' => 'admin2@gmail.com',
        'phone' => null,
        'age' => null,
        'class_name' => null,
        'role' => 'Admin',
        'password' => bcrypt('KD47810A'),
        'remember_token' => null,
        'email_verified_at' => now(),
        'is_read' => null,
        'school_id' => null,
        'clinic_id' => 2,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Admin KP Puchong',
        'username' => 'PC_NQT',
        'email' => 'admin@3ail.com',
        'phone' => null,
        'age' => null,
        'class_name' => null,
        'role' => 'Admin',
        'password' => bcrypt('PC47100A'),
        'remember_token' => null,
        'email_verified_at' => now(),
        'is_read' => null,
        'school_id' => null,
        'clinic_id' => 3,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Admin KP Kelana Jaya',
        'username' => 'KJ_NQT',
        'email' => 'admin4@gmail.com',
        'phone' => null,
        'age' => null,
        'class_name' => null,
        'role' => 'Admin',
        'password' => bcrypt('KJ47301A'),
        'remember_token' => null,
        'email_verified_at' => now(),
        'is_read' => null,
        'school_id' => null,
        'clinic_id' => 4,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Admin KP Seksyen 7',
        'username' => 'S7_NQT',
        'email' => 'admin5@gmail.com',
        'phone' => null,
        'age' => null,
        'class_name' => null,
        'role' => 'Admin',
        'password' => bcrypt('S740000A'),
        'remember_token' => null,
        'email_verified_at' => now(),
        'is_read' => null,
        'school_id' => null,
        'clinic_id' => 5,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Admin KP Seksyen 19',
        'username' => 'S19_NQT',
        'email' => 'admin6@gmail.com',
        'phone' => null,
        'age' => null,
        'class_name' => null,
        'role' => 'Admin',
        'password' => bcrypt('S1940300A'),
        'remember_token' => null,
        'email_verified_at' => now(),
        'is_read' => null,
        'school_id' => null,
        'clinic_id' => 6,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Admin KP Seri Kembangan',
        'username' => 'SK_NQT',
        'email' => 'petaling.kpsk@gmail.com',
        'phone' => null,
        'age' => null,
        'class_name' => null,
        'role' => 'Admin',
        'password' => bcrypt('SK43300A'),
        'remember_token' => null,
        'email_verified_at' => now(),
        'is_read' => null,
        'school_id' => null,
        'clinic_id' => 7,
        'created_at' => now(),
        'updated_at' => now(),
    ]
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
