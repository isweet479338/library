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
            $table->string('category_id')->nullable();
            $table->string('name')->nullable();
            $table->integer('copis')->nullable();
            $table->integer('available')->nullable();
            $table->string('picture')->nullable();
            $table->string('auther')->nullable();
            $table->string('page')->nullable();
            $table->text('discription')->nullable();
            $table->string('revision')->nullable();
            $table->date('last_release')->nullable();
            $table->date('first_release')->nullable();
            $table->string('revision_number')->nullable();
            $table->string('user_id')->nullable();
            $table->string('status')->default(1);
            $table->softDeletes();
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
