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
        Schema::create('placement_promos', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('placement_id');
            $table->integer('percentage');
            $table->string('message');
            $table->dateTime('start_at');	
            $table->dateTime('end_at');	
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('placement_promos');
    }
};
