<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

// importiamo Faker
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // inseriamo faker con la dependency injection
    public function run( Faker $faker)
    {
        
        // per evitare l'errore prima disabilitiamo le relazioni con altre tabelle poi usiamo truncate e poi riabilitiamo
        Schema::disableForeignKeyConstraints();
        Project::truncate();
        Schema::enableForeignKeyConstraints();

        for($i=0; $i<10; $i++){
            $project = new Project();

            $types = Type::inRandomOrder()->first(); //1 record della tabella types -> 1 istanza

            $project->title= $faker->sentence(3);
            $project->content= $faker->text(500);
            $project->slug = Str::slug($project->title, '-');
            $project->types_id = $types->id;

            $project->save();
        }
    }
}
