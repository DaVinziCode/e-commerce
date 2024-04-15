<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabulate_data', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('product_id');
            $table->integer('total_order');
            $table->integer('stock_left');
            $table->decimal('total_revenue');
            $table->decimal('total_cost');
            $table->decimal('total_profit');
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
        Schema::dropIfExists('tabulate_data');
    }
};
