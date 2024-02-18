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
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('restaurant_id')->constrained('restaurants');
            $table->foreignId('dish_id')->constrained('dishes');
            $table->foreignId('address_id')->constrained('address');
            $table->string('order_number');
            $table->string('quantity')->default(1);
            $table->string('price');
            $table->string('discount_price')->nullable();
            $table->string('total_price');
            $table->string('status')->default('pending');
            $table->string('payment_status')->default('pending');
            $table->enum('payment_mode', ['cod', 'upi', 'debit', 'credit'])->default('cod');
            $table->string('transaction_id')->nullable();
            $table->string('payment_response')->nullable();
            $table->string('delivery_time')->nullable();
            $table->string('delivery_date')->nullable();
            $table->string('delivery_charge')->nullable();
            $table->string('tax')->nullable();
            $table->string('discount')->nullable();
            $table->string('tip')->nullable();
            $table->string('total_amount');
            $table->enum('order_type', ['delivery', 'takeaway'])->default('delivery');
            $table->timestamp('order_placed_at')->nullable();
            $table->timestamp('accepted_at')->nullable();
            $table->timestamp('preparing_at')->nullable();
            $table->timestamp('dispatched_at')->nullable();
            $table->timestamp('delivered_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->string('reason_for_cancellation')->nullable();
            $table->string('cancellation_by')->nullable();
            $table->enum('rating', ['1', '2', '3', '4', '5'])->nullable();
            $table->enum('cancellation_status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->string('review')->nullable();
            $table->softDeletes();
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
