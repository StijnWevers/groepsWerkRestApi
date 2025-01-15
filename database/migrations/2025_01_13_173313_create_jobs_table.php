<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('location_id')->nullable();
            $table->decimal('fee', 8, 2)->nullable();
            $table->timestamps();

            // Foreign keys -> users & locations
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('set null');

            $table->foreign('location_id')
                  ->references('id')
                  ->on('locations')
                  ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
