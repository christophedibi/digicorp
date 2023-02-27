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
        Schema::table('contact_entreprise_prestataires', function (Blueprint $table) {
            $table->unsignedBigInteger('prestataire_id');
            $table->foreign('prestataire_id')->references('id')->on('prestataires')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contact_entreprise_prestataires', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();
            $table->dropForeign(['prestataire_id']);
            $table->dropColumn('prestataire_id');
        });
    }
};
