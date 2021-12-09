<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('musicas', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('path', 100);
            $table->integer('Likes');
            $table->double('duracao', 3, 2);
            $table->unsignedBigInteger('id_artista');
            $table->unsignedBigInteger('id_album');
            $table->unsignedBigInteger('id_genero');
            $table->timestamps();

           
           
            $table->foreign('id_album', 'id_album_fk')
                ->references('id')
                ->on('albums')
                ->onUpdate('CASCADE')
                ->onDelete('RESTRICT');
            
            $table->foreign('id_artista', 'id_artista_fk')
                ->references('id')
                ->on('artists')
                ->onUpdate('CASCADE')
                ->onDelete('RESTRICT');
            
            $table->foreign('id_genero', 'id_genero_fk')
                ->references('id')
                ->on('generos')
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
        Schema::dropIfExists('musicas');
    }
}
