<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 10, 2);
            $table->string('donor_name');
            $table->string('donor_email');
            $table->string('campaign')->nullable();
            $table->string('transaction_id')->unique();
            $table->dateTime('date');
            $table->enum('status', ['pending', 'completed', 'failed'])->default('pending');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('donations');
    }
};
