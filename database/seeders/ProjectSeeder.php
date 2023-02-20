<?php

namespace Database\Seeders;

use App\Models\project as ModelsProject;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 25; $i++) { 
            $newProject = new ModelsProject();
            $newProject->title = $faker->unique()->realTextBetween(5,10);
            $newProject->author =$faker->realTextBetween(3,10);
            $newProject->slug = Str::slug($newProject->title);
            $newProject->content =$faker->realTextBetween(500,900);
            $newProject->project_date_start =$faker->DateTimeThisYear();
            $newProject->project_date_end =$faker->DateTimeThisYear();
            $newProject->save();
        }
    }
}
