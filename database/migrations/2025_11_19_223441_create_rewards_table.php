<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up()
{
    Schema::create('rewards', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description')->nullable();
        $table->integer('points_required'); // النقاط المطلوبة
        $table->string('image')->nullable(); // صورة الهدية لو حبيت
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('rewards');
    }
};
