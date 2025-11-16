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
        Schema::create('producttbls', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->decimal('product_price', 10, 2); // Updated to decimal for price
            $table->decimal('product_discount_price', 10, 2)->nullable(); // Nullable decimal for discount price
            $table->text('product_description'); // Changed to text for longer descriptions
            $table->json('product_images'); // JSON type for storing image paths
// Foreign Keys - Manual
    $table->unsignedBigInteger('category_id')->nullable();
    $table->foreign('category_id')->references('id')->on('categorytbls')->onDelete('cascade');

    $table->unsignedBigInteger('sizechart_id')->nullable();
    $table->foreign('sizechart_id')->references('id')->on('charts')->onDelete('cascade');

            $table->json('sizes');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producttbls');
    }
};
