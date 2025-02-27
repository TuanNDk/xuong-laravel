<?php

use App\Models\Order;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Order::class)->constrained();
            $table->foreignIdFor(ProductVariant::class)->constrained();
            $table->unsignedInteger('quantity')->default(0);

            // Sao lưu thông tin sản phẩm
            $table->string('product_name');
            $table->string('product_sku');
            $table->string('product_img_thumbnail')->nullable();
            $table->double('product_price_regular');
            $table->double('product_price_sale')->nullable();

            // Sao lưu thông tin của biến thể
            $table->string('variant_size_name');
            $table->string('variant_color_name');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
