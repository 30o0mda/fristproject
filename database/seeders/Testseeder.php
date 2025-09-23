<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Test;
use League\CommonMark\Extension\Table\TableStartParser;
use Illuminate\Database\Eloquent\Factories\Sequence;



class Testseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        test::factory()->count(10)
            ->state(
                new Sequence(
                    ['status' => 'enabled'],
                    ['status' => 'disabled'],
                )
            )
            ->state(
                new Sequence(
                    ['show' => '1'],
                    ['show' => '0'],
                )
            )->create();


        // for ($i = 0; $i < 50; $i++) {
        //     Test::create([
        //         'name' => 'test _ ' . $i,
        //         'content' => 'content _ ' . $i,
        //         'status' => 'enabled',
        //         'show' => 1 ,

        //     ]);
        // }
    }
}
