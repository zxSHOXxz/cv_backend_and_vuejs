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
        Schema::create('eductaions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('place');
            $table->string('text');
            $table->date('from');
            $table->date('to')->nullable();
            $table->boolean('until_now');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eductaions');
    }
};
