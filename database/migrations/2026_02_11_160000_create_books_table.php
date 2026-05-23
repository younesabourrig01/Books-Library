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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('designation')->unique();
            $table->text('description')->nullable();
            $table->foreignId('tag_id')->nullable()->constrained('tags')->onDelete('cascade');
            $table->string('langue')->default('Francais');
            $table->string('editeur')->default('Anonyme');
            $table->foreignId('category_id')->nullable()->constrained('caterories')->onDelete('cascade');
            $table->double('prix')->default('0');
            $table->string('auteur')->default('Anonyme');
            $table->string('type')->nullable();
            $table->string('cover')->default('no_cover.jpg');
            $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
