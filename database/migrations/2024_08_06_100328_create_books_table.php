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
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('books');
        Schema::table('books', function (Blueprint $table) {
            $table->string('title')->nullable(false)->change();
        });
    
    }

    public function up()
{
    Schema::table('books', function (Blueprint $table) {
        $table->string('photo')->nullable(); // Add photo column
    });
}

public function down()
{
    Schema::table('books', function (Blueprint $table) {
        $table->dropColumn('photo');
    });
}

}

