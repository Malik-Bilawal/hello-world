<?php
use App\Models\dealtbl;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {Schema::create('dealtbl', function (Blueprint $table) {
    $table->id();
    $table->string('deal_name');
    $table->decimal('deal_price', 10, 2);
    $table->decimal('deal_discount_price', 10, 2)->nullable();
    $table->text('deal_description');
    $table->json('deal_images');
    $table->json('sizes'); // New sizes column as JSON
 $table->unsignedBigInteger('category_id');
    $table->foreign('category_id')->references('id')->on('categorytbls')->onDelete('cascade');

    $table->unsignedBigInteger('sizechart_id');
    $table->foreign('sizechart_id')->references('id')->on('charts')->onDelete('cascade');

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dealtbl');
    }
};
