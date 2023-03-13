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
        Schema::create('proformas', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name'); 
            $table->string('customer_email'); 
            $table->string('quantite');
            $table->string('prix_unitaire');

            // $table->string('total_unitaire'); //calculer en fonction de la quantite sur chaque produits
            // $table->string('total_ht');
            // $table->string('total_ttc');

            // 'quantite',
            // 'prix_unitaire',
            // //Le total unitaire sera  appelé total_ht
            // 'total_ht',
            // 'client_id',
            // 'produit_id',
            // 'total_ttc', //total de toutes taxes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proformas');
    }
};
