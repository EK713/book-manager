<?php

// database/migrations/2023_03_01_000000_create_books_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('Untitled')->change();
            $table->string('author')->notNullValue();
            $table->text('description')->nullable();
            $table->image('photo')->nullable(); 
            $table->unsignedBigInteger('user_id')->nullable()->change();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
           
        });
    }

    public function down()
    {
        Schema::dropIfExists('books');
        Schema::table('books', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            $table->string('title')->nullable(false)->change(); 
            $table->dropColumn('photo');
            });
    }
}
