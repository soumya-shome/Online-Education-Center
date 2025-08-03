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
        Schema::create('paper_sets', function (Blueprint $table) {
            $table->string('p_id')->primary();
            $table->string('c_id');
            $table->enum('p_type', ['ONLINE', 'OFFLINE']);
            $table->integer('total_marks');
            $table->integer('time_limit');
            $table->string('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paper_sets');
    }
}; 