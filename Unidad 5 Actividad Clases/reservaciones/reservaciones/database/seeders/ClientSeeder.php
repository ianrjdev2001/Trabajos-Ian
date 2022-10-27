<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new Client();
        $client->name = 'Ian';
        $client->phone_number = '1242432';
        $client->email = 'ian@gmail.com';
        $client->save();

        $client = new Client();
        $client->name = 'Enrique';
        $client->phone_number = '6969696';
        $client->email = 'kime@gmail.com';
        $client->save();
    }
}
