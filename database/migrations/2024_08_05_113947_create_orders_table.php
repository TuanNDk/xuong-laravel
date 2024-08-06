<?php

use App\Models\Order;
use App\Models\User;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(User::class)->constrained();


            // Thông tin người đặt hàng
            $table->string('user_name');
            $table->string('user_email');
            $table->string('user_phone');
            $table->string('user_address');
            $table->string('user_note')->nullable();

            $table->boolean('is_ship_user_same_user')->default(true);

            // Thông tin người nhận hàng
            $table->string('ship_user_name')->nullable();
            $table->string('ship_user_email')->nullable();
            $table->string('ship_user_phone')->nullable();
            $table->string('ship_user_address')->nullable();
            $table->string('ship_user_note')->nullable();

            // Loại trạng thái
            $table->string('status_order')->default(Order::STATUS_ORDER_PENDING);
            $table->string('status_payment')->default(Order::STATUS_PAYMENT_UNPAID);

            $table->double('total_price', 15, 2);
            $table->timestamps();
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
