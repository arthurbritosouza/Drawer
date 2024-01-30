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
        Schema::create('anotacao', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('nome_anotacao');
            $table->string('anotacao');
            $table->timestamps();
        });
     }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('anotacao');
    }
};
