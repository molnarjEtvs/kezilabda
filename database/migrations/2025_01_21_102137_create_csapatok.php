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
        Schema::create('csapatok', function (Blueprint $table) {
            $table->id("cs_id");
            $table->string("csapat_nev",255);
            $table->string("szekhely",255);
            $table->year("alapitasi_ev");
            $table->string("vezeto_edzo",255);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('csapatok');
    }
};
