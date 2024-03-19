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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('name');
            $table->string('category');
            $table->string('thumbnail');
            $table->json('task_req');
            $table->text('proof_req');
            $table->string('proof_type');
            $table->integer('approval_time');
            $table->integer('submission_time');
            $table->decimal('budget', 10, 2);
            $table->decimal('reward', 10, 3);
            $table->integer('limit');
            $table->integer('daily_submission');
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
