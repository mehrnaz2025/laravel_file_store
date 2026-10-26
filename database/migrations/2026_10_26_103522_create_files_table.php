<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->tinyInteger('is_free_preview')->default(0);
            $table->integer('number')->default(0);
            $table->string('file');
            $table->string('original_name');
            $table->string('mime_type');
            $table->unsignedBigInteger('size');
            $table->string('extension');
            $table->tinyInteger('type')->default(0) ->comment("0=>audio/mpeg, 1=>audio/wav, 2=>application/zip , 3=>application/x-rar-compressed,
                                                               4=>application/x-7z-compressed,5=>'application/x-tar, 6=>application/pdf, 7=>text/plain,
                                                                8=>application/octet-stream");
            $table->timestamps();
        });
    }


    public function down(): void {
        Schema::dropIfExists('files');
    }
};
