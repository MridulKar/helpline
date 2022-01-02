<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mobile');
            $table->string('email');
            $table->string('arrivals_id')->nullable();
            $table->string('airlines_id')->nullable();
            $table->string('flight_no')->nullable();
            $table->date('flight_date')->nullable();
            $table->string('origin')->nullable();
            $table->string('passengers')->nullable();
            $table->string('transports_id')->nullable();
            $table->string('hotels_id')->nullable();
            $table->string('subject')->nullable();
            $table->string('corporates_id')->nullable();
            $table->string('corporate_subject')->nullable();
            $table->string('payments_id')->nullable();
            $table->string('lounges_id')->nullable();
            $table->string('message');
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('books');
    }
}
