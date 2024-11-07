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
        Schema::table('dstb_tables', function (Blueprint $table) {
            $table->string('dstb_permAdd')->after('res_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dstb_tables', function (Blueprint $table) {
            $table->dropColumn('dstb_permAdd');
        });
    }
};
