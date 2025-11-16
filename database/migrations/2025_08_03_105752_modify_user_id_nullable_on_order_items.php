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
    Schema::table('order_items', function (Blueprint $table) {
        $table->dropForeign(['user_id']); // Drop FK first
        $table->unsignedBigInteger('user_id')->nullable()->change(); // Make nullable
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Reapply FK
    });
}

public function down(): void
{
    Schema::table('order_items', function (Blueprint $table) {
        $table->dropForeign(['user_id']);
        $table->unsignedBigInteger('user_id')->nullable(false)->change(); // Make not nullable again
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}

};
