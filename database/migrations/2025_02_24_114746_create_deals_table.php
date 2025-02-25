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
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("title", 30);
            $table->decimal("price", 10, 2); 
            $table->decimal("previous_price", 10, 2);
            $table->decimal("rating", 3, 2);
            $table->string("description", 300);
            $table->string("category", 30);
            $table->string("image", 300);
            $table->string("shop", 50);
            $table->string("url", 300);
            $table->boolean("available");
            $table->foreignId("users_id")->constrained('user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deals');
    }
};
