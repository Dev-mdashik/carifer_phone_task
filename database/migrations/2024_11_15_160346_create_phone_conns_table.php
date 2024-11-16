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
        Schema::create('phone_conns', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cust_id')->unsigned();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email_address')->unique();
            $table->date('date_of_birth');
            $table->text('address');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->date('date');
            $table->time('time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phone_conns');
    }
};
