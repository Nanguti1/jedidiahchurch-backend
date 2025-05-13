<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sermons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('scripture_reference')->nullable();
            $table->dateTime('date');
            $table->string('video_url')->nullable();
            $table->string('audio_url')->nullable();
            $table->text('notes')->nullable();
            $table->foreignId('preacher_id')->constrained('users');
            $table->string('thumbnail')->nullable();
            $table->json('tags')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sermons');
    }
};
