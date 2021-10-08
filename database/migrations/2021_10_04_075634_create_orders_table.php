<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->enum('order_status', ['cart', 'submitted order'])->default('cart');
            $table->float('total_price', 8, 2)->nullable();
            $table->timestamp('order_datetime')->nullable();
            $table->string('customer_name', 50)->nullable();
            $table->string('customer_surname', 50)->nullable();
            $table->string('address_line1', 50)->nullable();
            $table->string('address_line2', 50)->nullable();
            $table->string('delivery_notes', 50)->nullable();
            $table->string('city', 20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
