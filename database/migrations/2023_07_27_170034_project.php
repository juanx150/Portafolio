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
            $table->string('foto')->nullable();
            $table->bigInteger('n_id')->unsigned();
            $table->string('propietario', 60);
            $table->string('nombre', 100);
            $table->text('descripcion');
            $table->string('tecnologias', 200);
            $table->string('fechainicio', 60);
            $table->string('fechafinal', 60);
            $table->timestamps();

            $table->foreign('n_id')->references('id')->on('category')
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
