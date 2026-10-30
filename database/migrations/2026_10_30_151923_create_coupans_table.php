<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('coupans', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('percent');
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('coupans');
    }
};
