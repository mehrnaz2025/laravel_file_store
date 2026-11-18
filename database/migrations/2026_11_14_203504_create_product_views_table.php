<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('product_views', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products');
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->string('ip_address', 45);
            $table->timestamp('viewed_at');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('product_views');
    }
};
