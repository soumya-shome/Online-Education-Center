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
        Schema::create('exams', function (Blueprint $table) {
            $table->string('e_id')->primary();
            $table->string('e_date');
            $table->string('e_slot');
            $table->string('st_id');
            $table->string('c_id');
            $table->enum('p_type', ['ONLINE', 'OFFLINE']);
            $table->string('p_set');
            $table->string('activation_code');
            $table->enum('status', ['PENDING', 'COMPLETE'])->default('PENDING');
            $table->string('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
}; 