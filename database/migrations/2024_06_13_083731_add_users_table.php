<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table("users", function (Blueprint $table) {
            $table->string('role')->default('user')->after('name');
            $table->string('character')->after('password');
            $table->string('history')->after('character');
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
