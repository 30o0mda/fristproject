<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\View;
class ViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // View::factory()->count(1000)->create();
        for ($i = 0; $i < 1000; $i++) {
            \DB::table('views')->insert([
                'title' => fake()->text(), // $this->faker->text(),
                'content' => fake()->paragraph(), // $this->faker->paragraph(),
            ]);
        }
    }
}
