<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Drug;

class DrugSeeder extends Seeder
{
    public function run()
    {
        Drug::insert([
            ['name' => 'Paracetamol'],
            ['name' => 'Amoxicillin'],
            ['name' => 'Ibuprofen'],
        ]);
    }
}
