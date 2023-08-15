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
        Schema::create('configuracions', function (Blueprint $table) {
            $table->id();
            $table->boolean('notificar')->default(false)->nullable(); //notificaciones de discord
            $table->string('avatar_img')->nullable();//imagen avatar
            $table->string('deaths_img')->nullable();//imagen deaths
            $table->string('kills_img')->nullable();//imagen kills
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configuracions');
    }
};
