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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('password')->nullable();
            $table->string('mobile_number')->nullable()->unique();
            $table->string('otp')->nullable();
            $table->timestamp('otp_verified_at')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->default('inactive');
            $table->string('is_email_verified')->default('0');
            $table->dateTime('email_verified_at')->nullable();
            $table->string('is_mobile_verified')->default('0');
            $table->string('is_active')->default(true);
            $table->string('is_deleted')->default(false);
            $table->string('is_blocked')->default(false);
            $table->enum('type', ['customer', 'restaurant','admin'])->default(config('constants.USER_TYPE.VENDOR'));
            $table->string('token')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
