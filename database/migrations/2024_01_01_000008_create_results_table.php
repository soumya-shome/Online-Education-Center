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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->string('r_id')->unique();
            $table->string('e_id');
            $table->string('st_id');
            $table->integer('marks_obtained');
            $table->integer('total_marks');
            $table->decimal('percentage', 5, 2);
            $table->enum('status', ['PASS', 'FAIL']);
            $table->timestamp('submitted_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
}; 