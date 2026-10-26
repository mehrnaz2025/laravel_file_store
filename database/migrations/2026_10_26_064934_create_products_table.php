<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void{
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable()->unique();
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->string('auther')->nullable();
            $table->string('speaker')->nullable();
            $table->unsignedBigInteger('price')->default(0);
            $table->unsignedInteger('view')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('marketable')->default(0);
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }


    public function down(): void{
        Schema::dropIfExists('products');
    }
};
