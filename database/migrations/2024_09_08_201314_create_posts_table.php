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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            // Foreign key related to the user who created
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Post title
            $table->string('title');
            
            // Post description
            $table->text('content');
            
            // url used for the image
            $table->string('photo_path', 2048)->default('https://ajuda.ufrpe.br/images/footer/ufrpe-uni.png')->nullable();
            // Like counter
            $table->unsignedInteger('likes')->default(0);
            
            // Comment counter
            $table->unsignedInteger('comments_count')->default(0);

            
            //Create timestamps in the table
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
