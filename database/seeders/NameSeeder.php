<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Name;

class NameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Name::create([
            'name'=>'ゴリラ',
            'leftRight'=>1,
            'nameCount'=>3,
        ]);

        Name::create([
            'name'=>'暴れ狂った',
            'leftRight'=>0,
            'nameCount'=>5,
        ]);

        Name::create([
            'name'=>'トーマス',
            'leftRight'=>1,
            'nameCount'=>4,
        ]);
    }
}
