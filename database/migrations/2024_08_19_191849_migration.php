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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone_number', 20)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->text('address')->nullable();
            $table->enum('role', ['user', 'merchant'])->default('merchant'); // e.g., 'user' or 'merchant'
            $table->string('business_name')->nullable();
            $table->text('business_address')->nullable();
            $table->timestamps();
        });

        // Create the categories table
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Create the products table
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('image_url');
            $table->foreignId('user_id')->constrained('users');
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->integer('stock');
            $table->foreignId('category_id')->constrained('categories');
            $table->timestamps();
        });

        // Create the orders table
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->decimal('total_price', 10, 2);
            $table->string('status', 50);
            $table->timestamps();
        });

        // Create the order items table
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders');
            $table->foreignId('product_id')->constrained('products');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->timestamps();
        });

        // Create the shopping cart table
        Schema::create('shopping_cart', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('product_id')->constrained('products');
            $table->integer('quantity');
            $table->timestamps();
        });

        // Create the payments table
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders');
            $table->string('payment_method', 100);
            $table->decimal('amount', 10, 2);
            $table->string('status', 50);
            $table->timestamps();
        });

        // Create the reviews table
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('product_id')->constrained('products');
            $table->integer('rating');
            $table->text('comment');
            $table->timestamps();
        });

        // Create the addresses table
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->text('address');
            $table->string('city', 255);
            $table->string('state', 255);
            $table->string('postal_code', 20);
            $table->string('country', 100);
            $table->timestamps();
        });

        // Create the merchant payments table
        Schema::create('merchant_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users'); // merchant
            $table->foreignId('order_id')->constrained('orders');
            $table->decimal('amount', 10, 2);
            $table->string('status', 50);
            $table->timestamps();
        });

        // Create the merchant reviews table
        Schema::create('merchant_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users'); // customer
            $table->foreignId('merchant_id')->constrained('users'); // merchant
            $table->integer('rating');
            $table->text('comment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
