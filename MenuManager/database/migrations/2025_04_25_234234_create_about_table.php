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
        Schema::create('about', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable()->default('----');
            $table->string('image');
            $table->json('localizations')->default('{"latitude": "-1.4456579831580272", "longitude", "-48.4890580363906"}');
            $table->text('url_facebook')->nullable()->default('#');
            $table->text('url_instagram')->nullable()->default('#');
            $table->text('telefone')->nullable()->default('(99) 99999-9999');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about');
    }
};
