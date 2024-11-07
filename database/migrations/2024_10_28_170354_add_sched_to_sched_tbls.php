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
        Schema::table('sched_tbls', function (Blueprint $table) {
            $table->unsignedBigInteger('vt_id')->after('sched_id')->nullable(); 
            $table->foreign('vt_id')->references('vt_id')->on('vaccine_taken_tbls')->onDelete('cascade');

            $table->unsignedBigInteger('sideB_id')->before('sched_desc')->nullable(); 
            $table->foreign('sideB_id')->references('sideB_id')->on('fp_side_b_tbls')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sched_tbls', function (Blueprint $table) {
            //
        });
    }
};
