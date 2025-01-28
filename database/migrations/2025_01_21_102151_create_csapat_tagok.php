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
        Schema::create('csapat_tagok', function (Blueprint $table) {
            $table->id("cst_id");
            $table->foreignId("cs_id")->references("cs_id")->on("csapatok")->onDelete("cascade");
            $table->string("nev",255);
            $table->date("szuletesi_ido");
            $table->string("poszt",255);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('csapat_tagok');
    }
};
