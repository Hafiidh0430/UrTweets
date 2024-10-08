<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('post', function (Blueprint $table) {
            $table->id('id_post');
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->string('image')->nullable(true);
            $table->text('title')->nullable(false);
            $table->text('description')->nullable(false);
            $table->timestamps();

            $table->foreign('user_id')->references('id_user')->on('user')->onDelete('cascade')->onUpdate('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};
