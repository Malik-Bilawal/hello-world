<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('order_number')->unique();
           $table->decimal('subtotal', 10, 2)->nullable();
$table->decimal('discount', 10, 2)->nullable();
$table->decimal('tax', 10, 2)->nullable();
$table->decimal('shipping_cost', 10, 2)->nullable();
$table->decimal('total_amount', 10, 2)->nullable();

            $table->string('status')->default('Pending');
            $table->string('address');
            $table->string('city');
            $table->string('country')->nullable();
            $table->string('apartment');
            $table->string('postal_code');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('payment_method');
            $table->string('payment_ss')->nullable(); // For online transactions
            $table->string('transaction_sms')->nullable(); // Optional field for transactions
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
