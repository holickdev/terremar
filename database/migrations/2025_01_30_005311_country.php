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
        // Schema::create('countries', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->timestamps();
        // });

        // Schema::create('states', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->foreignId('country_id')->constrained()->onDelete('cascade');
        //     $table->timestamps();
        // });

        // Schema::create('municipalities', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->foreignId('state_id')->constrained()->onDelete('cascade');
        //     $table->timestamps();
        // });

        // Schema::create('parishes', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->foreignId('municipality_id')->constrained()->onDelete('cascade');
        //     $table->timestamps();
        // });

        Schema::table('addresses', function (Blueprint $table) {
            $table->foreignId('parish_id')->constrained()->onDelete('cascade');
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
