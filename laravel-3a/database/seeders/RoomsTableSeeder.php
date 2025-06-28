<?php

namespace Database\Seeders;

class RoomsTableSeeder extends \Illuminate\Database\Seeder
{
    public function run(): void
    {
        $this->command->comment('Nastavuji DB místností');

        \App\Models\Room::factory(20)->create();
    }
}
