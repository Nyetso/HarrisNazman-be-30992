<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id()->PrimaryKey();
            $table->string('title');
            $table->date('release_date');
            $table->integer('duration_length');
            $table->text('views');
            $table->longText('description');
            $table->longText('poster');
            $table->text('mpaa_rating');
            $table->string('director');
            $table->string('language');
            $table->integer('cinemas_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
