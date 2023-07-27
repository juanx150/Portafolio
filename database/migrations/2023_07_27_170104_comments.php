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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('mensaje');
            $table->string('autor', 60);
            $table->string('fechapublicacion', 60);
            $table->bigInteger('n_id')->unsigned();
            $table->timestamps();

            $table->foreign('n_id')->references('id')->on('project')
            ->onDelete('cascade')
            ->onUpdate('cascade');

           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
