<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('prayer_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->text('request');
            $table->boolean('is_private')->default(false);
            $table->enum('status', ['new', 'praying', 'answered'])->default('new');
            $table->dateTime('submitted_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('prayer_requests');
    }
};
