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
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('user')->change();  // Change existing role column
        });
    }


public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('role');  // Remove the role column if needed
    });
}

};
