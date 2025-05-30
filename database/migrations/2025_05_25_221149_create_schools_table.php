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
       Schema::create('schools', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('code');
    $table->foreignId('clinic_id')->nullable()->constrained('clinics')->onDelete('set null');
    $table->timestamps();
});

DB::table('schools')->insert([
    ['id' => 1, 'name' => 'SMK La Salle PJ', 'code' => 'BEB8654', 'clinic_id' => 1, 'created_at' => now(), 'updated_at' => now()],
    ['id' => 2, 'name' => 'SMK Taman Medan', 'code' => 'BEA8613', 'clinic_id' => 1, 'created_at' => now(), 'updated_at' => now()],
    ['id' => 3, 'name' => 'SMK Taman Dato’ Harun', 'code' => 'BEA8607', 'clinic_id' => 1, 'created_at' => now(), 'updated_at' => now()],
    ['id' => 4, 'name' => 'SMK Seksyen 1 Bandar Kinrara', 'code' => 'BEA8639', 'clinic_id' => 1, 'created_at' => now(), 'updated_at' => now()],
    ['id' => 5, 'name' => 'SMK Subang Utama', 'code' => 'BEA8614', 'clinic_id' => 1, 'created_at' => now(), 'updated_at' => now()],
    ['id' => 6, 'name' => 'SMK Katholik', 'code' => 'BEB8653', 'clinic_id' => 1, 'created_at' => now(), 'updated_at' => now()],
    ['id' => 7, 'name' => 'SMK Bandar Sunway', 'code' => 'BEA8626', 'clinic_id' => 1, 'created_at' => now(), 'updated_at' => now()],
    ['id' => 8, 'name' => 'SMK Subang Jaya', 'code' => 'BEA8604', 'clinic_id' => 1, 'created_at' => now(), 'updated_at' => now()],
    ['id' => 9, 'name' => 'SMK Sri Utama', 'code' => 'BEA8624', 'clinic_id' => 1, 'created_at' => now(), 'updated_at' => now()],
    ['id' => 10, 'name' => 'SMK (L) Bukit Bintang', 'code' => 'BEB8652', 'clinic_id' => 1, 'created_at' => now(), 'updated_at' => now()],
    ['id' => 11, 'name' => 'SMK (P) Taman Petaling', 'code' => 'BEB8658', 'clinic_id' => 1, 'created_at' => now(), 'updated_at' => now()],
    ['id' => 12, 'name' => 'SMK Seksyen 8 Kota Damansara', 'code' => 'BEA8666', 'clinic_id' => 2, 'created_at' => now(), 'updated_at' => now()],
    ['id' => 13, 'name' => 'SMK Lembah Subang', 'code' => 'BEA8661', 'clinic_id' => 2, 'created_at' => now(), 'updated_at' => now()],
    ['id' => 14, 'name' => 'SMK Subang Bestari', 'code' => 'BEA8662', 'clinic_id' => 2, 'created_at' => now(), 'updated_at' => now()],
    ['id' => 15, 'name' => 'SMK Damansara Damai 1', 'code' => 'BEA8652', 'clinic_id' => 2, 'created_at' => now(), 'updated_at' => now()],
    ['id' => 16, 'name' => 'SMK Seksyen 10 Kota Damansara', 'code' => 'BEA8638', 'clinic_id' => 2, 'created_at' => now(), 'updated_at' => now()],
    ['id' => 17, 'name' => 'SMK Seksyen 4 Kota Damansara', 'code' => 'BEA8655', 'clinic_id' => 2, 'created_at' => now(), 'updated_at' => now()],
    ['id' => 18, 'name' => 'SMK Bandar Sri Damansara 1', 'code' => 'BEA8659', 'clinic_id' => 2, 'created_at' => now(), 'updated_at' => now()],
    ['id' => 19, 'name' => 'SMK Subang', 'code' => 'BEA8630', 'clinic_id' => 2, 'created_at' => now(), 'updated_at' => now()],
// Clinic ID 3 - KP Puchong Batu 14
['id' => 20, 'name' => 'SMK Puchong', 'code' => 'BEA8601', 'clinic_id' => 3, 'created_at' => now(), 'updated_at' => now()],
['id' => 21, 'name' => 'SMK Pusat Bandar Puchong 1', 'code' => 'BEA8649', 'clinic_id' => 3, 'created_at' => now(), 'updated_at' => now()],
['id' => 22, 'name' => 'SMK Puchong Permai', 'code' => 'BEA8663', 'clinic_id' => 3, 'created_at' => now(), 'updated_at' => now()],
['id' => 23, 'name' => 'SMK Puchong Utama (1)', 'code' => 'BEA8636', 'clinic_id' => 3, 'created_at' => now(), 'updated_at' => now()],
['id' => 24, 'name' => 'SMK Bandar Puchong Jaya (A)', 'code' => 'BEA8656', 'clinic_id' => 3, 'created_at' => now(), 'updated_at' => now()],
['id' => 25, 'name' => 'SMK Bandar Puchong Jaya (B)', 'code' => 'BEA8657', 'clinic_id' => 3, 'created_at' => now(), 'updated_at' => now()],
['id' => 26, 'name' => 'SMK Bandar Puchong Perdana', 'code' => 'BEA8628', 'clinic_id' => 3, 'created_at' => now(), 'updated_at' => now()],
['id' => 27, 'name' => 'SMK USJ 13', 'code' => 'BEA8633', 'clinic_id' => 3, 'created_at' => now(), 'updated_at' => now()],
['id' => 28, 'name' => 'SMK Seksyen 3 Bandar Kinrara', 'code' => 'BEA8645', 'clinic_id' => 3, 'created_at' => now(), 'updated_at' => now()],

// Clinic ID 4 - KP Kelana Jaya
['id' => 29, 'name' => 'SMK Kelana Jaya', 'code' => 'BEA8615', 'clinic_id' => 4, 'created_at' => now(), 'updated_at' => now()],
['id' => 30, 'name' => 'SMK Sri Permata', 'code' => 'BEA8602', 'clinic_id' => 4, 'created_at' => now(), 'updated_at' => now()],
['id' => 31, 'name' => 'SMK (P) Sri Aman', 'code' => 'BEB8655', 'clinic_id' => 4, 'created_at' => now(), 'updated_at' => now()],
['id' => 32, 'name' => 'SMK Bandar Sri Damansara 2', 'code' => 'BEA8641', 'clinic_id' => 4, 'created_at' => now(), 'updated_at' => now()],
['id' => 33, 'name' => 'SMK Assunta', 'code' => 'BEB8651', 'clinic_id' => 4, 'created_at' => now(), 'updated_at' => now()],
['id' => 34, 'name' => 'SMK Taman SEA', 'code' => 'BEB8656', 'clinic_id' => 4, 'created_at' => now(), 'updated_at' => now()],
['id' => 35, 'name' => 'SMK Bandar Utama Damansara 3', 'code' => 'BEA8643', 'clinic_id' => 4, 'created_at' => now(), 'updated_at' => now()],
['id' => 36, 'name' => 'SMK Bandar Utama Damansara 4', 'code' => 'BEA8644', 'clinic_id' => 4, 'created_at' => now(), 'updated_at' => now()],
['id' => 37, 'name' => 'SMK Tropicana', 'code' => 'BEA8640', 'clinic_id' => 4, 'created_at' => now(), 'updated_at' => now()],
['id' => 38, 'name' => 'SMK Damansara Utama', 'code' => 'BEA8611', 'clinic_id' => 4, 'created_at' => now(), 'updated_at' => now()],
['id' => 39, 'name' => 'SMK Damansara Jaya', 'code' => 'BEA8608', 'clinic_id' => 4, 'created_at' => now(), 'updated_at' => now()],
['id' => 40, 'name' => 'SMK Damansara Utama (2)', 'code' => 'BEA8658', 'clinic_id' => 4, 'created_at' => now(), 'updated_at' => now()],
['id' => 41, 'name' => 'SMK Sultan Abdul Samad', 'code' => 'BEB8657', 'clinic_id' => 4, 'created_at' => now(), 'updated_at' => now()],
['id' => 42, 'name' => 'SAM Bestari', 'code' => 'BFT8002', 'clinic_id' => 4, 'created_at' => now(), 'updated_at' => now()],

['id' => 43, 'name' => 'SMK Seksyen 9', 'code' => 'BEA8629', 'clinic_id' => 5, 'created_at' => now(), 'updated_at' => now()],
['id' => 44, 'name' => 'SMK TTDI Jaya', 'code' => 'BEA8637', 'clinic_id' => 5, 'created_at' => now(), 'updated_at' => now()],
['id' => 45, 'name' => 'SMK Seksyen 7', 'code' => 'BEA8648', 'clinic_id' => 5, 'created_at' => now(), 'updated_at' => now()],
['id' => 46, 'name' => 'SMK Bukit Jelutong', 'code' => 'BEA8650', 'clinic_id' => 5, 'created_at' => now(), 'updated_at' => now()],
['id' => 47, 'name' => 'SMK SS17', 'code' => 'BEA8625', 'clinic_id' => 5, 'created_at' => now(), 'updated_at' => now()],
['id' => 48, 'name' => 'SMK Seksyen 16', 'code' => 'BEA8610', 'clinic_id' => 5, 'created_at' => now(), 'updated_at' => now()],
['id' => 49, 'name' => 'SMK Shah Alam', 'code' => 'BEA8668', 'clinic_id' => 5, 'created_at' => now(), 'updated_at' => now()],
['id' => 50, 'name' => 'SMK Seksyen 18', 'code' => 'BEA8617', 'clinic_id' => 5, 'created_at' => now(), 'updated_at' => now()],
['id' => 51, 'name' => 'SMK Setia Alam', 'code' => 'BEA8665', 'clinic_id' => 5, 'created_at' => now(), 'updated_at' => now()],
['id' => 52, 'name' => 'SMK Seksyen Sebelas', 'code' => 'BEA8616', 'clinic_id' => 5, 'created_at' => now(), 'updated_at' => now()],
['id' => 53, 'name' => 'SMK Sultan Salahuddin Abdul Aziz Shah', 'code' => 'BEA8603', 'clinic_id' => 5, 'created_at' => now(), 'updated_at' => now()],
['id' => 54, 'name' => 'SAMT Tengku Ampuan Jemaah', 'code' => 'BFT8003', 'clinic_id' => 5, 'created_at' => now(), 'updated_at' => now()],
['id' => 55, 'name' => 'SMK USJ 4', 'code' => 'BEA8632', 'clinic_id' => 5, 'created_at' => now(), 'updated_at' => now()],

['id' => 56, 'name' => 'SMK Alam Megah', 'code' => 'BEA8622', 'clinic_id' => 6, 'created_at' => now(), 'updated_at' => now()],
['id' => 57, 'name' => 'SMK USJ 8', 'code' => 'BEA8634', 'clinic_id' => 6, 'created_at' => now(), 'updated_at' => now()],
['id' => 58, 'name' => 'SMK Seksyen 24 (2)', 'code' => 'BEA8654', 'clinic_id' => 6, 'created_at' => now(), 'updated_at' => now()],
['id' => 59, 'name' => 'SMK USJ 12', 'code' => 'BEA8635', 'clinic_id' => 6, 'created_at' => now(), 'updated_at' => now()],
['id' => 60, 'name' => 'SMK Seksyen 19', 'code' => 'BEA8621', 'clinic_id' => 6, 'created_at' => now(), 'updated_at' => now()],
['id' => 61, 'name' => 'SMK Taman Sri Muda', 'code' => 'BEA8623', 'clinic_id' => 6, 'created_at' => now(), 'updated_at' => now()],
['id' => 62, 'name' => 'SMK Alam Megah 2', 'code' => 'BEA8653', 'clinic_id' => 6, 'created_at' => now(), 'updated_at' => now()],
['id' => 63, 'name' => 'SMK Seafield', 'code' => 'BEA8618', 'clinic_id' => 6, 'created_at' => now(), 'updated_at' => now()],
['id' => 64, 'name' => 'SMK USJ 23', 'code' => 'BEA8642', 'clinic_id' => 6, 'created_at' => now(), 'updated_at' => now()],
['id' => 65, 'name' => 'SMK Seksyen 27', 'code' => 'BEA8660', 'clinic_id' => 6, 'created_at' => now(), 'updated_at' => now()],

['id' => 66, 'name' => 'SMK Seri Kembangan', 'code' => 'BEB8659', 'clinic_id' => 7, 'created_at' => now(), 'updated_at' => now()],
['id' => 67, 'name' => 'SMK Puncak Jalil', 'code' => 'BEA8670', 'clinic_id' => 7, 'created_at' => now(), 'updated_at' => now()],
['id' => 68, 'name' => 'SMK Seri Indah', 'code' => 'BEA8627', 'clinic_id' => 7, 'created_at' => now(), 'updated_at' => now()],
['id' => 69, 'name' => 'SMK Taman Desaminium', 'code' => 'BEA8664', 'clinic_id' => 7, 'created_at' => now(), 'updated_at' => now()],
['id' => 70, 'name' => 'SMK Seksyen 4 Bandar Kinrara', 'code' => 'BEA8647', 'clinic_id' => 7, 'created_at' => now(), 'updated_at' => now()],
['id' => 71, 'name' => 'SMK Seri Serdang', 'code' => 'BEA8606', 'clinic_id' => 7, 'created_at' => now(), 'updated_at' => now()],

]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
