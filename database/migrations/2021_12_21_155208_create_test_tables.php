<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\{Schema, DB};

class CreateTestTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        /**
         * Table structure for the test as described on https://github.com/Promobit/teste-cadastro-produtos.
         */

        // Create products table
        // Obs: I have added 'description' and 'price' fields to the original table structure.
        DB::statement("
          CREATE TABLE `product` (
            `id` int NOT NULL AUTO_INCREMENT,
            `name` varchar(50) NOT NULL,
            `description` text NOT NULL,
            `price` decimal(9, 2) NOT NULL,
            PRIMARY KEY (`id`),
            UNIQUE KEY `name_UNIQUE` (`name`)
          );
        ");

        // Create product tags table
        DB::statement("
          CREATE TABLE `tag` (
            `id` int NOT NULL AUTO_INCREMENT,
            `name` varchar(50) NOT NULL,
            PRIMARY KEY (`id`),
            UNIQUE KEY `name_UNIQUE` (`name`)
          );");

        // Create pivot products/tags table
        DB::statement("
          CREATE TABLE `product_tag` (
            `product_id` int NOT NULL,
            `tag_id` int NOT NULL,
            PRIMARY KEY (`product_id`,`tag_id`),
            CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
            CONSTRAINT `tag_id` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`)
         );");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
        Schema::dropIfExists('tag');
        Schema::dropIfExists('product_tag');
    }
}
