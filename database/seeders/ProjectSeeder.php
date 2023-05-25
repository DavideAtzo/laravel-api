<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++){
            $type = Type::inRandomOrder()->first();

            $project = new Project();
            $project->project_title = $faker->word;
            $project->creation_date = $faker->date();
            $project->description = $faker->text(100);
            $project->slug = Str::slug($project->project_title, '-');
            $project->type_id = $type->id;
            $project->save();
        }
    }
}
