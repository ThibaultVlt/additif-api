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
        Schema::create('additifs', function (Blueprint $table) {
            $table->id('id_additifs ');
            $table->string('code_additifs');
            $table->string('libelle_additifs');
            $table->integer('id_toxicite');
            $table->integer('id_categorie');
            $table->foreign('id_toxicite')->references('id')->on('toxicites')->onDelete('cascade');
            $table->foreign('id_categorie')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('additifs');
    }
};
