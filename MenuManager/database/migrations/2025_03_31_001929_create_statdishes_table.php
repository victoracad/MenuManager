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
        Schema::create('statdishes', function (Blueprint $table) {
            $table->id();
            $table->integer('views')->unsigned()->nullable()->default(0);
            $table->integer('shares')->unsigned()->nullable()->default(0);
            $table->foreignId('dishes_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statdishes');
    }
};
