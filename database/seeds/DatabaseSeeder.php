<?php
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder {public function run(){
$s=\App\Production::firstOrCreate(['name'=>'Walker Texas Ranger'],['type'=>'series','classification'=>'Acción','release_date'=>'1993-04-21','review'=>'Serie sobre un ranger de Texas que investiga delitos y protege a su comunidad.','season'=>1]);
$m=\App\Production::firstOrCreate(['name'=>'Walker Texas Ranger Trial by Fire'],['type'=>'movie','classification'=>'Acción','release_date'=>'2005-10-16','review'=>'Película para televisión que continúa las investigaciones de Cordell Walker.','season'=>null]);
$c=\App\Character::firstOrCreate(['name'=>'Cordell Walker'],['picture'=>'https://assets.chucknorris.host/img/avatar/chuck-norris.png','description'=>'Ranger de Texas interpretado por Chuck Norris. Combina investigación, artes marciales y un fuerte sentido de la justicia.']);$c->productions()->sync([$s->id,$m->id]);
}}
