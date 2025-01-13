<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Als je bijvoorbeeld de kolommen 'lastname' en 'phone' wilt verwijderen
            $table->dropColumn(['email_verified_at', 'password', 'remember_token', 'created_at', 'updated_at', ]);
            
     
        });
    }
};
