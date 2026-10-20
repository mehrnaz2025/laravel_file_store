<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('badge_text')->comment('متن بج');
            $table->string('badge_icon')->comment('آیکون بج');
            $table->string('badge_color')->comment('رنگ پس‌زمینه بج');
            $table->timestamp('expire_at')->nullable()->comment('زمان پایان برای تایمر معکوس');
            $table->string('link_url')->nullable();;
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('position')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
