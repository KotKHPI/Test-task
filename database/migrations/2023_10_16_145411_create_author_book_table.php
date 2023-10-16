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
        Schema::create('author_book', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Author::class)->constrained();
            $table->foreignIdFor(\App\Models\Book::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('author_book', function (Blueprint $table) {
            $table->dropForeignIdFor(\App\Models\Author::class);
            $table->dropForeignIdFor(\App\Models\Book::class);
        });

        Schema::dropIfExists('author_book');
    }
};
