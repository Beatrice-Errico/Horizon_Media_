<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([ 
            'name'=>'Sara',
            'email'=>'sara@mail.com',
            'password'=>Hash::make('12345678'),
            'age'=>'32',
            'gender'=>'femmina',
            'marital status'=>'sposata',
            'taste'=>'Starbuks, Sushi',
            'newspapers'=>'Corriere.it, Leggo',
            'car'=>'Fiat Panda',
            'movie&music'=>'Musica classica, teatro',
            'sites'=>'SEOsitecheckup, facebook, instagram ',
            'hobbies'=>'lettura, viaggi',
            'attitudes'=>'affarista',
            'job'=>'Ghostwriter, Articolista freelance',
            'is_writer'=>true,
        ]);


        User::create([

            'name' =>'Corrado',
            'email'=>'corrado@mail.com',
            'password'=>Hash::make('12345678'),
            'age'=>'40',
            'gender'=>'maschio',
            'marital status'=>'sposato',
            'taste'=>'Food&Wine, Glamping',
            'newspapers'=>'Sole 24ore, Wall Street Journal',
            'car'=>'Alfa Romeo Stelvio',
            'movie&music'=>'Cinema azione e Rock',
            'sites'=>'Booking.com, Skyscanner',
            'hobbies'=>'Hiking, Scii, Golf',
            'attitudes'=>'Leader severo ma giusto',
            'job'=>'Chif executive Officer di HorizonMedia',
            'is_admin'=>true


        ]);


        User::create([

            'name' =>'Marta',
            'email'=>'marta@mail.com',
            'password'=>Hash::make('12345678'),
            'age'=>'27',
            'gender'=>'femmina',
            'marital status'=>'single',
            'taste'=>'IQOS, caffè nero',
            'newspapers'=>'GQ, Vogue',
            'car'=>'BMW serie 3',
            'movie&music'=>'Slice-of-life, Indie',
            'sites'=>'AnnaWintour, Milano FashionWeek',
            'hobbies'=>'Moda, Reality',
            'attitudes'=>'Persona precisa ed esigente',
            'job'=>'Editor Professionale',
            'is_revisor'=>true


        ]);
    }
}
