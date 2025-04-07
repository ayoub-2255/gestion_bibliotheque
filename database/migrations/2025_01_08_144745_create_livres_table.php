<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivresTable extends Migration
{
    public function up()
    {
        Schema::create('livres', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('auteur_id'); // Foreign key field
            $table->timestamps();

            // Define the foreign key constraint
            $table->foreign('auteur_id')
                  ->references('id')
                  ->on('auteurs')
                  ->onDelete('cascade'); // Cascade delete
        });
    }

    public function down()
    {
        Schema::dropIfExists('livres');
    }
}
