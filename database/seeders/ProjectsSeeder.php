<?php

namespace Database\Seeders;

use App\Models\Project;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {
        $project = Project::create([
            'name'              => $faker->name,
            'description'             => 'Front-end',
            'status'             => true,
            'completion_date' => $faker->date(),
            'image' => $faker->name(),
        ]);
    }
}
