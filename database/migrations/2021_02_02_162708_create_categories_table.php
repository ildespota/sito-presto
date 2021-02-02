<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('img');
            $table->timestamps();
        });

    
        $names=['Immobili','Case e Arredamento','Elettrodomestici','Telefonia','Fotografia','Computer','Videogiochi','Auto','Moto e Motorini','Animali','Libri','Musica e Film','Sport','Offerte di Lavoro','Giocattoli'];
        foreach($names as $name)
        {
            $category= new Category();
            $category->name = $name;
            $category->save();
        }
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
