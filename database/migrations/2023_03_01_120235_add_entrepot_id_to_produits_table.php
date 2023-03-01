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
        Schema::table('produits', function (Blueprint $table) {
            $table->unsignedBigInteger('entrepot_id');
            $table->foreign('entrepot_id')->references('id')->on('entrepots')->onDelete('cascade');
            Schema::enableForeignKeyConstraints();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produits', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();
            $table->dropForeign(['entrepot_id']);
            $table->dropColumn('entrepot_id');
        });
    }
};
