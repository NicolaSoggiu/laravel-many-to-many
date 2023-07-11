<?php

namespace Database\Seeders;
use App\Models\Type;
use App\Models\Project;
use App\Models\Technology;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $types = Type::all()->pluck("id");
        $technologies = Technology::all();


        for($i = 0; $i < 50; $i++){
            $project = Project::create([
                'technology_id' => $faker->randomElement($technologies)->id,
                'title' => $faker->sentence(),
                'url_image'=> $faker->imageUrl(640, 480, 'animals', true),
                'repo'=>  $faker->word(),
                'languages'=> $faker->sentence(),
                'description'=> $faker->paragraph(),
            ]);

            $project->types()->sync($faker->randomElements($types, null));
        }
    }
}