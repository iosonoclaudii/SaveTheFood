<?php
// database/migrations/create_products_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->decimal('price', 8, 2); // Permite valores com vírgula, ex: 1,99
            $table->decimal('discounted_price', 8, 2)->nullable(); // Novo campo
            $table->string('store')->nullable(); // Novo campo
            $table->string('city')->nullable(); // Novo campo
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
