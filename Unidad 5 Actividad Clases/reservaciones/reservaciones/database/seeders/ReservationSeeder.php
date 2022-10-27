<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reservation;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $reservation = new  Reservation();
        $reservation->room_id = '1';
        $reservation->name = 'Cliente_1';
        $reservation->client_id = '1';
        $reservation->save();

        $reservation2 = new  Reservation();
        $reservation2->room_id = '2';
        $reservation2->name = 'Cliente_2';
        $reservation2->client_id = '2';
        $reservation2->save();

        $reservation3 = new  Reservation();
        $reservation3->room_id = '3';
        $reservation3->name = 'Cliente_3';
        $reservation3->client_id = '2';
        $reservation3->save();

        /*
        $reservation2 = new  Reservation();
        $reservation2->client_id = '2';
        $reservation2->room_id = '2';
        $reservation2->name = 'Cliente_2';
        $reservation2->save();

        $reservation3 = new  Reservation();
        $reservation3->client_id = '3';
        $reservation3->room_id = '3';
        $reservation3->name = 'Cliente_3';
        $reservation3->save();*/
    }
}
