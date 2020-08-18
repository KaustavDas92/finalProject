<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->json('product_ids');
            $table->json('quantities');
            $table->float('total');
            $table->text('payment_type');
            $table->string('status')->default('active');
            $table->unsignedBigInteger('customer_id');
            $table->timestamps();

            $table->foreign('customer_id')
                ->references('id')
                ->on('customer_details')
                ->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
