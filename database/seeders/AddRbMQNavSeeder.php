<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Navbar;

class AddRbMQNavSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Navbar::create([
            'name' => 'RabbitMQ',
            'route' => 'rabbitmq.index',
            'ordering' => 2
        ]);
    }
}
