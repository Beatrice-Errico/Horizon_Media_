<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Ramsey\Uuid\Codec\TimestampLastCombCodec;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        $article1 = Article::create
        ([
        'title'=> 'L\'impatto dell\' Intelligenza sul lavoro futuro' ,
        'subtitle'=> 'Come le tecnologie emergenti stanno trasformando il mondo professionale ',
        'body'=>'negli ultimi anni , l\'intelligenza artificiale (ha rivoluzionato diversi settori.)',
        'image'=>"IA.jpg",
        'user_id'=>1,
        'category_id'=>6,
        'is_accepted'=>true,
        'slug'=>"Intelligenza-artificiale-sul-futuro",

    ]);

     $article2 = Article::create
        ([
        'title'=> 'Olimpiadi Milano Cortina 2026 - caos trasporti' ,
        'subtitle'=> 'Grandi problemi sui trasporti',
        'body'=>'Purtroppo sulle olimpiadi non abbiamo molte cose da dire. Il sistema di territorio si è mosso con grave ritardo, solo all\'ultimo anno, il tavolo sulla mobilità si sta muovendo. Parole importanti pronunciate da Gabriele Mariani. ',
        'image'=>"Olimpiadi.jpg",
        'user_id'=>1,
        'category_id'=>4,
        'is_accepted'=>true,
        'slug'=> "Olimpiadi-Milano-2026",

    ]);
     $article3 = Article::create
        ([
        'title'=> 'Avengers' ,
        'subtitle'=> 'Avangers: Doomsday e Secret Wars posticipano la data di uscita al cinema',
        'body'=>'Disney sta apportando delle modifiche al suo calendario di uscita, posticipando entrambi i progetti Marvel',
        'image'=>"Avengers.jpg",
        'user_id'=>1,
        'category_id'=>5,
        'is_accepted'=>true,
        'slug'=> "Nuova-uscita-Avangers",
    ]);
     $article4 = Article::create
        ([
        'title'=> 'Italia e Danimarca guidano l\'iniziativa per espellere migranti condannati: nove paesi chiedono più autonomia' ,
        'subtitle'=> 'Meloni e Frederiksen propongono una revisione delle convenzioni europee per facilitare l\'espulsione degli stranieri che hanno commesso reati, suscitando critiche da parte delle organizzazioni per i diritti umani',
        'body'=>'Il 23 maggio 2025, Italia e Danimarca hanno annunciato una proposta congiunta, sostenuta da altri sette paesi europei, per riformare le convenzioni internazionali che regolano le politiche migratorie, come la Convenzione Europea dei Diritti dell\'Uomo. L\'obiettivo è concedere maggiore autonomia agli Stati membri nell\'espulsione di migranti che hanno commesso reati, sostenendo che le attuali normative ostacolano tali procedure e compromettono la sicurezza interna.',
        'image'=>"Politica.jpg",
        'user_id'=>1,
        'category_id'=>1,
        'is_accepted'=>true,
        'slug'=> "Italia-e-Danimarca-Migranti",
    ]);
     $article5 = Article::create
        ([
        'title'=> 'TUTTOFOOD 2025: Milano si conferma capitale mondiale del food & beverage' ,
        'subtitle'=> 'Dal 5 all\'8 maggio, oltre 3.000 brand da 35 Paesi si danno appuntamento a Rho Fiera per l\'evento che celebra innovazione, sostenibilità e nuove tendenze alimentari.',
        'body'=>'TUTTOFOOD 2025, in programma dal 5 all\'8 maggio a Rho Fiera Milano, si preannuncia come l\'evento di riferimento per il settore agroalimentare a livello globale. Con oltre 3.000 espositori provenienti da 35 Paesi e una previsione di 90.000 visitatori professionali, la manifestazione rappresenta una piattaforma strategica per l\'espansione nei mercati esteri .',
        'image'=>"Acaj.jpg",
        'user_id'=>1,
        'category_id'=>3,
        'is_accepted'=>true,
        'slug'=> "Tuttofood-2025",
    ]);
     $article6 = Article::create
        ([
        'title'=> ' I dazi di Trump: un’eredità controversa nel commercio globale' ,
        'subtitle'=> 'L’imposizione di tariffe doganali sotto l’amministrazione Trump ha rimodellato le relazioni commerciali tra USA, Cina e i partner internazionali, con effetti duraturi sull’economia mondiale.',
        'body'=>'Durante la presidenza di Donald Trump (2017-2021), una delle politiche commerciali più discusse è stata l’imposizione di dazi doganali su una vasta gamma di prodotti importati, in particolare dalla Cina. Questa strategia, parte della cosiddetta “guerra commerciale”, mirava a proteggere le industrie americane e a correggere quelli che Trump definiva “pratiche commerciali sleali”, come il furto di proprietà intellettuale e il dumping.',
        'image'=>"dazi.jpg",
        'user_id'=>1,
        'category_id'=>2,
        'is_accepted'=>true,
        'slug'=> "I-dazi-di-Trump",
    ]);
    Tag::create ([
        'name' => 'Hashtag1'
        
    ]);
    Tag::create ([
        'name' => 'Hashtag2'
        
    ]);
    Tag::create ([
        'name' => 'Hashtag3'
        
    ]);



    $articles = [$article1, $article2, $article3, $article4, $article5, $article6];
    $tags = Tag::all();
    foreach ($articles as $article){
        $randomTags = $tags->random(rand(1,3));
        $article->tags()->attach($randomTags->pluck('id'));
    }
}
}