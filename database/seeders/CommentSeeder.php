<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 30; $i++) {

            $project = Project::inRandomOrder()->first();

            $comment = new Comment();
            $comment->author = fake()->name;
            $comment->content = fake()->text();
            $comment->email = fake()->email();
            $comment->project_id = $project->id;
            $comment->save();

        }
    }
}
