<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->integer('Likes');
            $table->unsignedBigInteger('id_artista');
            $table->timestamps();


            $table->foreign('id_artista', 'id_artista_fk')
                ->references('id')
                ->on('artists')
                ->onUpdate('CASCADE')
                ->onDelete('RESTRICT');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('albums');
    }
}
