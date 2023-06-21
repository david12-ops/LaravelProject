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

        //     'year' => 'required|numeric|min:1000|max:' . Carbon::now()->year,

        Schema::create('cds', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20)->unique();
            $table->integer('year');
            $table->integer('genre_id')->unsigned();
            $table->integer('auth_id')->unsigned();
            $table->foreign('genre_id')
                ->references('id')
                ->on('genres')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('auth_id')
                ->references('id')
                ->on('authors')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });
        //DB::statement("ALTER TABLE cds ADD CONSTRAINT  check_year_range CHECK (year > 1000 && year < YEAR(CURDATE())");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cds');
    }
};
