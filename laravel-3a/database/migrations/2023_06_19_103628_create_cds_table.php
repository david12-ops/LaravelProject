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
        Schema::create('cds', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->integer('year');
            $table->integer('genre_id')->unsigned();
            $table->integer('auth_id')->unsigned();
            $table->foreign('genre_id')
                ->references('id')
                ->on('genres');
            $table->foreign('auth_id')
                ->references('id')
                ->on('authors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cds');
    }
};
