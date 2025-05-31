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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();

			$table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('filename');
            $table->string('path');
            $table->string('mime_type');
            $table->bigInteger('size');
            $table->integer('duration')->nullable();
            $table->unsignedBigInteger('uploaded_by')->nullable();
			$table->string('preview')->nullable();

            $table->timestamps();

			$table->foreign('uploaded_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
