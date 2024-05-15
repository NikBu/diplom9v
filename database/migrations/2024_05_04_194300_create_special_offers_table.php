<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('special_offers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->timestamps();
        });

        Schema::create('special_offer_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('special_offer_id');
            $table->unsignedBigInteger('item_id');
            $table->decimal('discount_amount', 10, 2);
            $table->timestamps();

            $table->foreign('special_offer_id')->references('id')->on('special_offers')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('special_offer_items');
        Schema::dropIfExists('special_offers');
    }
}
