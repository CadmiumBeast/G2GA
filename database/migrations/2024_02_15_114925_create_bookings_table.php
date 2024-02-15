<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Pc_Name')->default(0);
            $table->unsignedBigInteger('Pc_Price')->default(0);
            $table->time('StartTime');
            $table->time('EndTime');
            $table->unsignedBigInteger('User_Name')->default(0);
            $table->string('duration')->nullable();
            $table->timestamps();

            $table->foreign('Pc_Name')->references('Pc_Name')->on('computers')->cascadeOnDelete();
            $table->foreign('Pc_Price')->references('Price')->on('computers')->cascadeOnDelete();
            $table->foreign('User_Name')->references('name')->on('users')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
