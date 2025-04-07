<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuteursTable extends Migration
{
    public function up()
    {
        Schema::create('auteurs', function (Blueprint $table) {
            $table->id(); // Creates an unsignedBigInteger primary key
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('auteurs');
    }
}
