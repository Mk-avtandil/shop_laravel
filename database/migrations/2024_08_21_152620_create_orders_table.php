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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->text('description');
            $table->integer('category_id');
            $table->integer('quantity');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();

            #$table->softDeletes();

//            $table->foreignIdFor(\App\Models\Product::class)->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
