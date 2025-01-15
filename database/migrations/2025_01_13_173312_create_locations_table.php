<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('amount', 8, 2)->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->timestamps();

            // Foreign key -> cities
            $table->foreign('city_id')
                  ->references('id')
                  ->on('cities')
                  ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
