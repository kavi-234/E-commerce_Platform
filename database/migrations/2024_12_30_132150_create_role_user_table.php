<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('role_user', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');  // Foreign key to the users table
        $table->foreignId('role_id')->constrained()->onDelete('cascade');  // Foreign key to the roles table
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('role_user');
}

};
