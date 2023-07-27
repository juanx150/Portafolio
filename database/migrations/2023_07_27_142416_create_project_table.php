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
        Schema::create('project', function (Blueprint $table) {
            $table->id();
            $table->string('autor', 60)->unique();
            $table->string('nombreparticipantes',6000);
            $table->string('descripcion', 60);
            $table->string('fechainicio', 60);
            $table->string('fechafinal', 60);
            

            $table->foreignId('category_id');
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('category')
            ->onDelete('cascade')
            ->onUpdate('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project');
    }
};
