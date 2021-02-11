<?php

use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->text('description')->nullable();
            $table->string('img')->nullable();
            $table->timestamps();
        });

    
        $names=['Immobili','Case e Arredamento','Elettrodomestici','Telefonia','Fotografia','Computer','Videogiochi','Auto','Moto e Motorini','Animali','Libri','Musica e Film','Sport','Offerte di Lavoro','Giocattoli'];
        $images=['public/img/immobili.jpg','public/img/arredamento.jpg','public/img/elettrodomestici.jpg','public/img/telefonia.jpg','public/img/fotografia.jpg','public/img/computer.jpg','public/img/videogiochi.jpg','public/img/auto.jpg','public/img/moto.jpg','public/img/animali.jpg','public/img/libri.jpg','public/img/musica.jpg','public/img/sport.jpg','public/img/lavoro.jpg','public/img/giocattoli.jpg'];
        $descriptions=['Le migliori case per la tua famiglia','Decora la tua casa con lo stile che preferisci','Grandi e piccoli da noi trovi quello che fa per te','Cerca il tuo prossimo smartphone','Compatta, reflex o mirrorless scegli quella perfetta per te ','Componilo come preferisci','Immergiti nella tua prossima avventura','La tua prossima auto è qui che ti aspetta','Scooter o moto scegli quello che preferisci','Tutto quello che ti serve per i tuoi amici pelosi','La cultura passa anche da noi','Concerto o spettacolo per ogni genere','Allenati anche a casa','Il tuo prossimo lavoro è qui che ti aspetta','Fai una sorpresa a tuo figlio'];



        foreach($names as $key => $name)
        {
            $category= new Category();
            $category->name = $name;
            $category->img = $images[$key];
            $category->description= $descriptions[$key];
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
