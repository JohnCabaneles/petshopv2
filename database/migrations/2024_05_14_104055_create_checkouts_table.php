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
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('product_id')->nullable()->references('id')->on('products')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('amount')->nullable();
            $table->string('status')->nullable();
            $table->string('type')->nullable();
            /* For card ui */
            $table->string('card_holder_name')->nullable();
            $table->string('credit_card_number')->nullable();
            $table->string('expiration_date')->nullable();
            $table->string('cvv')->nullable();
            /* For gcash ui */
            $table->string('contact_number')->nullable();
            $table->string('account_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkouts');
    }
};
