<?php

namespace Database\Seeders;

use App\Models\Developer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Developer 1',
                'duration' => 1,
                'level' => 1,
            ],
            [
                'name' => 'Developer 2',
                'duration' => 1,
                'level' => 2,
            ],
            [
                'name' => 'Developer 3',
                'duration' => 1,
                'level' => 3,
            ],
            [
                'name' => 'Developer 4',
                'duration' => 1,
                'level' => 4,
            ],
            [
                'name' => 'Developer 5',
                'duration' => 1,
                'level' => 5,
            ],
        ];


        Developer::insert($data);
    }
}
