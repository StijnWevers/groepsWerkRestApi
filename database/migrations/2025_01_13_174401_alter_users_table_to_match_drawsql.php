<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        // Hernoem de kolom 'name' naar 'firstname'
        $table->renameColumn('name', 'firstname');

        // Voeg nieuwe kolommen toe
        $table->string('lastname')->nullable();
        $table->string('phone')->nullable();
        
        // Voeg foreign keys toe
        $table->unsignedBigInteger('location_id')->nullable();
        $table->unsignedBigInteger('role_id')->nullable();

        // Koppel 'location_id' aan 'locations.id'
        $table->foreign('location_id')
              ->references('id')
              ->on('locations')
              ->onDelete('set null');

        // Koppel 'role_id' aan 'roles.id'
        $table->foreign('role_id')
              ->references('id')
              ->on('roles')
              ->onDelete('set null');
    });
}
public function down()
{
    Schema::table('users', function (Blueprint $table) {
        // Verwijder eerst de foreign keys
        $table->dropForeign(['location_id']);
        $table->dropForeign(['role_id']);

        // Drop de kolommen
        $table->dropColumn(['location_id', 'role_id', 'lastname', 'phone']);

        // Hernoem 'firstname' terug naar 'name'
        $table->renameColumn('firstname', 'name');
    });
}


};
