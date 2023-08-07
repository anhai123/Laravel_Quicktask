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
        Schema::table('products', function (Blueprint $table) {
            if (!Schema::hasColumn('products', 'product_id')) {
                $table->bigInteger('product_id')->unsigned()->index()->nullable();
                $table->foreign('product_id')->references('id')->on('products');
            }

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumn('products', 'product_id')) {
                $table->dropForeign(['product_id']);
                $table->dropIndex(['product_id' => 'product_id']);
                $table->dropColumn('product_id');
            }
        });
    }
};
