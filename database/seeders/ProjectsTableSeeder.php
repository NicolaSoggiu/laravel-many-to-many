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
        for ($i = 0; $i < 50; $i++) {
            $types = Type::all();
            $technologies = Technology::all()->pluck('id');
            $project = Project::create([
                'type_id' => $faker->randomElement($types)->id,
                'title' => $faker->sentence(),
                'url_image'=> $faker->imageUrl(640, 480, 'animals', true),
                'repo'=>  $faker->word(),
                'languages'=> $faker->sentence(),
                'description'=> $faker->paragraph(),
            ]);

            $project->technologies()->sync($faker->randomElements($technologies, rand(1, 4)));
        }
    }
}