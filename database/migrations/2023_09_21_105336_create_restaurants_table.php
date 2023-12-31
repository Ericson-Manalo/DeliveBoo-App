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
        Schema::create('restaurants', function (Blueprint $table) {
          
            $table->id();
            $table->unsignedBigInteger('user_id');//->primary();
            $table->string('name')->required();
            $table->string('address')->required()->unique();
            $table->bigInteger('VAT_number')->required();
            //$table->string('email')->unique();
            $table->float('opening_time')->nullable();
            $table->string('image')->nullable();
            $table->string('telephone_number')->nullable();
            $table->float('vote')->nullable();

            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onUpdate('cascade')
            ->cascadeOnDelete();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
