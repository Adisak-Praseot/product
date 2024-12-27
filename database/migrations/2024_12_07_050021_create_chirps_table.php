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
        Schema::create('chirps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();     //message เชื่อมโยงกับ user ของคนๆนั้น
            $table->string('message');
            $table->timestamps();
        });

        // php artisan migrate คำสั่งรันสร้าง colum 
        // php artisan migrate:fresh คำสั่งclean ใหม่ทั้งหมด ตั้งแต่ต้น
        // php artisan tinker : App\Models\Chirp::all();  คำสั่งตรวจเช็คข้อมูลว่าเข้ามารึยัง
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chirps');
    }
};
