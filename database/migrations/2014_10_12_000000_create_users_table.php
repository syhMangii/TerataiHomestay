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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('status');
            $table->string('role');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('remember_token', 100)->nullable();
            $table->timestamps(0); // created_at, updated_at
            $table->string('profile_img')->nullable();
        });

        DB::table('users')->insert([
            [
                'id' => 2,
                'name' => 'Admin',
                'username' => 'Admin',
                'email' => 'admin@gmail.com',
                'phone' => '0000000000',
                'status' => 'A',
                'role' => 'Admin',
                'email_verified_at' => '2024-01-29 07:15:55',
                'password' => bcrypt('abc123'), // bcrypt password
                'remember_token' => 'kqN6JfBdN0JEKq5zmi7OBqzhjNZLPkrXsEQf0WI4Ccg5c42dZSCylma0ni82',
                'created_at' => '2024-01-29 07:15:55',
                'updated_at' => '2024-01-29 07:15:55',
                'profile_img' => NULL,
            ],
            [
                'id' => 4,
                'name' => 'Nizam',
                'username' => 'Ali',
                'email' => 'nizam@gmail.com',
                'phone' => '01139334185',
                'status' => 'A',
                'role' => 'User',
                'email_verified_at' => NULL,
                'password' => bcrypt('abc123'), // bcrypt password
                'remember_token' => NULL,
                'created_at' => '2025-01-14 05:23:06',
                'updated_at' => '2025-01-14 06:06:17',
                'profile_img' => NULL,
            ],
            [
                'id' => 5,
                'name' => 'Haziq Alfian',
                'username' => 'Haziq',
                'email' => 'haziqalfian2002@gmail.com',
                'phone' => '0332161372',
                'status' => 'A',
                'role' => 'User',
                'email_verified_at' => NULL,
                'password' => bcrypt('abc123'), // bcrypt password
                'remember_token' => NULL,
                'created_at' => '2025-01-14 11:40:27',
                'updated_at' => '2025-01-15 01:30:58',
                'profile_img' => NULL,
            ],
            [
                'id' => 6,
                'name' => 'Izzul',
                'username' => 'izzul',
                'email' => 'izzul@gmail.com',
                'phone' => '666',
                'status' => 'A',
                'role' => 'User',
                'email_verified_at' => NULL,
                'password' => bcrypt('abc123'), // bcrypt password
                'remember_token' => NULL,
                'created_at' => '2025-01-14 16:13:25',
                'updated_at' => '2025-01-14 16:13:25',
                'profile_img' => NULL,
            ],
            [
                'id' => 7,
                'name' => 'wan faezah',
                'username' => 'wfaezah',
                'email' => 'wfaezah@fskm.uitm.edu.my',
                'phone' => '0173141231',
                'status' => 'A',
                'role' => 'User',
                'email_verified_at' => NULL,
                'password' => bcrypt('abc123'), // bcrypt password
                'remember_token' => NULL,
                'created_at' => '2025-01-15 01:20:13',
                'updated_at' => '2025-01-15 01:20:13',
                'profile_img' => NULL,
            ]
        ]);
    }
    
    public function down()
    {
        Schema::dropIfExists('users');
    }
    
};
