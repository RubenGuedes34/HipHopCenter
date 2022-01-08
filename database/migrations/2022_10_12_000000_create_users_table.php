<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->bigIncrements();
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->unsignedBigInteger('id_lastAlbum')->nullable();
            $table->unsignedBigInteger('id_lastPlaylist')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('type')->default(0); //normalUser=0   premiumUser=1   adminUser=2
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            
            $table->foreign('id_lastAlbum', 'id_lastAlbum_fk')
            ->references('id')
            ->on('albums')
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
        Schema::dropIfExists('users');
    }
}
