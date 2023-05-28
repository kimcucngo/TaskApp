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
            $table->foreignId('user_id');
            $table->string('task_name');
            $table->string('content');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('status')->comment('1:onpending','2:onprocess','3:done');
            $table->integer('priority')->comment('1:onpending','2:onprocess','3:done');
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
