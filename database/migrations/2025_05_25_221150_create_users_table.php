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
    $table->string('username')->unique();
    $table->string('email')->unique(); 
    // add age and class_name both nullable
    $table->integer('age')->nullable();
    $table->string('class_name')->nullable();
    $table->string('role');
    $table->timestamp('email_verified_at')->nullable();
    $table->string('password');
    $table->string('remember_token', 100)->nullable();
    $table->boolean('is_read')->default(false)->nullable();
    $table->foreignId('school_id')->nullable()->constrained('schools')->cascadeOnDelete();
    $table->foreignId('clinic_id')->nullable()->constrained('clinics')->onDelete('set null');
    $table->timestamps(); // created_at, updated_at
});

DB::table('users')->insert([
    [
        'username' => 'TM_NQT',
        'email' => 'admin1@gmail.com',
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
        'username' => 'KD_NQT',
        'email' => 'admin2@gmail.com',
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
        'username' => 'PC_NQT',
        'email' => 'admin@3ail.com',
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
        'username' => 'KJ_NQT',
        'email' => 'admin4@gmail.com',
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
        'username' => 'S7_NQT',
        'email' => 'admin5@gmail.com',
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
        'username' => 'S19_NQT',
        'email' => 'admin6@gmail.com',
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
        'username' => 'SK_NQT',
        'email' => 'petaling.kpsk@gmail.com',
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
    ],
    [
        'username' => 'Admin1',
        'email' => 'test1@gmail.com',
        'age' => null,
        'class_name' => null,
        'role' => 'Admin',
        'password' => bcrypt('abc123'),
        'remember_token' => null,
        'email_verified_at' => now(),
        'is_read' => null,
        'school_id' => null,
        'clinic_id' => 7,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'username' => 'Admin2',
        'email' => 'test2@gmail.com',
        'age' => null,
        'class_name' => null,
        'role' => 'Admin',
        'password' => bcrypt('abc123'),
        'remember_token' => null,
        'email_verified_at' => now(),
        'is_read' => null,
        'school_id' => null,
        'clinic_id' => 7,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'username' => 'Admin3',
        'email' => 'test3@gmail.com',
        'age' => null,
        'class_name' => null,
        'role' => 'Admin',
        'password' => bcrypt('abc123'),
        'remember_token' => null,
        'email_verified_at' => now(),
        'is_read' => null,
        'school_id' => null,
        'clinic_id' => 7,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'username' => 'Admin4',
        'email' => 'test4@gmail.com',
        'age' => null,
        'class_name' => null,
        'role' => 'Admin',
        'password' => bcrypt('abc123'),
        'remember_token' => null,
        'email_verified_at' => now(),
        'is_read' => null,
        'school_id' => null,
        'clinic_id' => 7,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'username' => 'Admin5',
        'email' => 'test5@gmail.com',
        'age' => null,
        'class_name' => null,
        'role' => 'Admin',
        'password' => bcrypt('abc123'),
        'remember_token' => null,
        'email_verified_at' => now(),
        'is_read' => null,
        'school_id' => null,
        'clinic_id' => 7,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'username' => 'Admin6',
        'email' => 'test6@gmail.com',
        'age' => null,
        'class_name' => null,
        'role' => 'Admin',
        'password' => bcrypt('abc123'),
        'remember_token' => null,
        'email_verified_at' => now(),
        'is_read' => null,
        'school_id' => null,
        'clinic_id' => 7,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'username' => 'Admin7',
        'email' => 'test7@gmail.com',
        'age' => null,
        'class_name' => null,
        'role' => 'Admin',
        'password' => bcrypt('abc123'),
        'remember_token' => null,
        'email_verified_at' => now(),
        'is_read' => null,
        'school_id' => null,
        'clinic_id' => 7,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'username' => 'Admin8',
        'email' => 'test8@gmail.com',
        'age' => null,
        'class_name' => null,
        'role' => 'Admin',
        'password' => bcrypt('abc123'),
        'remember_token' => null,
        'email_verified_at' => now(),
        'is_read' => null,
        'school_id' => null,
        'clinic_id' => 7,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'username' => 'Admin9',
        'email' => 'test9@gmail.com',
        'age' => null,
        'class_name' => null,
        'role' => 'Admin',
        'password' => bcrypt('abc123'),
        'remember_token' => null,
        'email_verified_at' => now(),
        'is_read' => null,
        'school_id' => null,
        'clinic_id' => 7,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'username' => 'Admin10',
        'email' => 'test
        10@gmail.com',
        'age' => null,
        'class_name' => null,
        'role' => 'Admin',
        'password' => bcrypt('abc123'),
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
