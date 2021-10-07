<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderExtras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_extras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_line_id')->constrained()->onDelete('cascade');
            $table->foreignId('extra_id')->constrained()->onDelete('cascade');
            $table->unsignedTinyInteger('quantity');
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
        Schema::dropIfExists('orders_extras');
    }
}
