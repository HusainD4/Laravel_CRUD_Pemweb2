<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToProductsTable extends Migration
{
 public function up()
    {
        // Adding columns to the 'products' table
        Schema::table('products', function (Blueprint $table) {
            // Ensure the 'name' column doesn't already exist before adding it
            if (!Schema::hasColumn('products', 'name')) {
                $table->string('name')->after('id'); // 'name' column after 'id'
            }

            // Ensure the 'price' column doesn't already exist before adding it
            if (!Schema::hasColumn('products', 'price')) {
                $table->decimal('price', 10, 2)->after('name'); // 'price' column after 'name'
            }

            // Ensure the 'category_id' column doesn't already exist before adding it
            if (!Schema::hasColumn('products', 'category_id')) {
                $table->unsignedBigInteger('category_id')->after('price'); // 'category_id' column after 'price'
                
                // Adding foreign key constraint for 'category_id'
                $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            }

            // Add the image column for storing the image path
            if (!Schema::hasColumn('products', 'image')) {
                $table->string('image')->nullable()->after('category_id'); // 'image' column after 'category_id'
            }
        });
    }

    public function down()
    {
    // Rollback: Drop the added columns if the migration is rolled back
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']); // Dropping foreign key first
            $table->dropColumn(['name', 'price', 'category_id', 'image']); // Dropping the columns
        });
    }
}
