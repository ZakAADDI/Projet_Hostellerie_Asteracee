<?php

namespace Database\Seeders;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            // Juillet
            //1
            [
                'room_id' => 1,
                'user_id' => 3,
                'starting_date' => Carbon::createFromDate('2023', '07', '01')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '07', '05')->format('Y-m-d'),
                'status' => 'ended',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => true,
                'checkin_date' => Carbon::create('2023', '07', '01', '14', '23', '08', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => Carbon::create('2023', '06', '25', '12', '10', '11', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //2
            [
                'room_id' => 2,
                'user_id' => 4,
                'starting_date' => Carbon::createFromDate('2023', '07', '03')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '07', '08')->format('Y-m-d'),
                'status' => 'ended',
                'total_price' => 100,
                'occupants' => 2,
                'is_confirmed' => true,
                'checkin_date' => Carbon::create('2023', '07', '03', '18', '17', '12', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => Carbon::create('2023', '05', '19', '22', '18', '11', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //3
            [
                'room_id' => 3,
                'user_id' => 5,
                'starting_date' => Carbon::createFromDate('2023', '07', '05')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '07', '10')->format('Y-m-d'),
                'status' => 'ended',
                'total_price' => 120,
                'occupants' => 2,
                'is_confirmed' => true,
                'checkin_date' => Carbon::create('2023', '07', '05', '11', '23', '11', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => Carbon::create('2023', '06', '11', '11', '13', '12', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //4
            [
                'room_id' => 4,
                'user_id' => 6,
                'starting_date' => Carbon::createFromDate('2023', '07', '07')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '07', '12')->format('Y-m-d'),
                'status' => 'ended',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => true,
                'checkin_date' => Carbon::create('2023', '07', '07', '11', '02', '08', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => Carbon::create('2023', '05', '01', '11', '13', '12', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //5
            [
                'room_id' => 5,
                'user_id' => 7,
                'starting_date' => Carbon::createFromDate('2023', '07', '09')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '07', '14')->format('Y-m-d'),
                'status' => 'ended',
                'total_price' => 220,
                'occupants' => 2,
                'is_confirmed' => true,
                'checkin_date' => Carbon::create('2023', '07', '09', '16', '09', '11', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => Carbon::create('2023', '03', '09', '16', '09', '11', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //6
            [
                'room_id' => 6,
                'user_id' => 8,
                'starting_date' => Carbon::createFromDate('2023', '07', '11')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '07', '16')->format('Y-m-d'),
                'status' => 'ended',
                'total_price' => 200,
                'occupants' => 2,
                'is_confirmed' => true,
                'checkin_date' => Carbon::create('2023', '07', '11', '19', '11', '08', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => Carbon::create('2023', '07', '01', '19', '11', '08', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //7
            [
                'room_id' => 7,
                'user_id' => 9,
                'starting_date' => Carbon::createFromDate('2023', '07', '13')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '07', '18')->format('Y-m-d'),
                'status' => 'ended',
                'total_price' => 100,
                'occupants' => 2,
                'is_confirmed' => true,
                'checkin_date' => Carbon::create('2023', '07', '13', '14', '23', '08', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => Carbon::create('2023', '06', '10', '14', '23', '08', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //8
            [
                'room_id' => 8,
                'user_id' => 10,
                'starting_date' => Carbon::createFromDate('2023', '07', '15')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '07', '20')->format('Y-m-d'),
                'status' => 'ended',
                'total_price' => 220,
                'occupants' => 2,
                'is_confirmed' => true,
                'checkin_date' => Carbon::create('2023', '07', '15', '14', '23', '08', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => Carbon::create('2023', '02', '22', '19', '44', '58', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //9
            [
                'room_id' => 9,
                'user_id' => 3,
                'starting_date' => Carbon::createFromDate('2023', '07', '17')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '07', '22')->format('Y-m-d'),
                'status' => 'ended',
                'total_price' => 120,
                'occupants' => 2,
                'is_confirmed' => true,
                'checkin_date' => Carbon::create('2023', '07', '17', '20', '10', '10', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //10
            [
                'room_id' => 10,
                'user_id' => 4,
                'starting_date' => Carbon::createFromDate('2023', '07', '19')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '07', '24')->format('Y-m-d'),
                'status' => 'ended',
                'total_price' => 120,
                'occupants' => 2,
                'is_confirmed' => true,
                'checkin_date' => Carbon::create('2023', '07', '19', '23', '10', '55', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => Carbon::create('2023', '03', '01', '23', '10', '55', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //11
            [
                'room_id' => 11,
                'user_id' => 5,
                'starting_date' => Carbon::createFromDate('2023', '07', '21')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '07', '27')->format('Y-m-d'),
                'status' => 'ended',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => true,
                'checkin_date' => Carbon::create('2023', '07', '21', '15', '22', '30', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => Carbon::create('2023', '04', '01', '15', '22', '30', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //12
            [
                'room_id' => 12,
                'user_id' => 6,
                'starting_date' => Carbon::createFromDate('2023', '07', '25')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '07', '31')->format('Y-m-d'),
                'status' => 'ended',
                'total_price' => 90,
                'occupants' => 2,
                'is_confirmed' => true,
                'checkin_date' => Carbon::create('2023', '07', '25', '14', '23', '08', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => Carbon::create('2023', '07', '02', '14', '23', '08', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //13
            [
                'room_id' => 13,
                'user_id' => 10,
                'starting_date' => Carbon::createFromDate('2023', '07', '01')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '07', '05')->format('Y-m-d'),
                'status' => 'ended',
                'total_price' => 220,
                'occupants' => 2,
                'is_confirmed' => true,
                'checkin_date' => Carbon::create('2023', '07', '01', '13', '22', '22', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => Carbon::create('2023', '01', '19', '23', '09', '01', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //14
            [
                'room_id' => 14,
                'user_id' => 9,
                'starting_date' => Carbon::createFromDate('2023', '07', '03')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '07', '08')->format('Y-m-d'),
                'status' => 'ended',
                'total_price' => 100,
                'occupants' => 2,
                'is_confirmed' => true,
                'checkin_date' => Carbon::create('2023', '07', '03', '21', '47', '11', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => Carbon::create('2023', '04', '27', '18', '17', '55', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //15
            [
                'room_id' => 15,
                'user_id' => 8,
                'starting_date' => Carbon::createFromDate('2023', '07', '05')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '07', '10')->format('Y-m-d'),
                'status' => 'ended',
                'total_price' => 220,
                'occupants' => 2,
                'is_confirmed' => true,
                'checkin_date' => Carbon::create('2023', '07', '05', '17', '22', '22', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => Carbon::create('2023', '06', '31', '07', '55', '38', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //16
            [
                'room_id' => 16,
                'user_id' => 7,
                'starting_date' => Carbon::createFromDate('2023', '07', '07')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '07', '12')->format('Y-m-d'),
                'status' => 'ended',
                'total_price' => 100,
                'occupants' => 2,
                'is_confirmed' => true,
                'checkin_date' => Carbon::create('2023', '07', '07', '10', '14', '15', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => Carbon::create('2023', '05', '23', '22', '44', '15', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //17
            [
                'room_id' => 17,
                'user_id' => 6,
                'starting_date' => Carbon::createFromDate('2023', '07', '09')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '07', '14')->format('Y-m-d'),
                'status' => 'ended',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => true,
                'checkin_date' => Carbon::create('2023', '07', '09', '23', '10', '08', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => Carbon::create('2023', '03', '19', '13', '15', '48', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //18
            [
                'room_id' => 18,
                'user_id' => 5,
                'starting_date' => Carbon::createFromDate('2023', '07', '11')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '07', '16')->format('Y-m-d'),
                'status' => 'ended',
                'total_price' => 100,
                'occupants' => 2,
                'is_confirmed' => true,
                'checkin_date' => Carbon::create('2023', '07', '11', '13', '12', '11', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => Carbon::create('2023', '05', '17', '19', '14', '51', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //19
            [
                'room_id' => 19,
                'user_id' => 4,
                'starting_date' => Carbon::createFromDate('2023', '07', '13')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '07', '18')->format('Y-m-d'),
                'status' => 'ended',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => true,
                'checkin_date' => Carbon::create('2023', '07', '13', '14', '55', '55', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => Carbon::create('2023', '03', '17', '22', '01', '45', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //20
            [
                'room_id' => 20,
                'user_id' => 3,
                'starting_date' => Carbon::createFromDate('2023', '07', '15')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '07', '20')->format('Y-m-d'),
                'status' => 'ended',
                'total_price' => 220,
                'occupants' => 2,
                'is_confirmed' => true,
                'checkin_date' => Carbon::create('2023', '07', '15', '19', '10', '03', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => Carbon::create('2023', '02', '26', '13', '14', '33', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //21
            [
                'room_id' => 21,
                'user_id' => 10,
                'starting_date' => Carbon::createFromDate('2023', '07', '17')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '07', '22')->format('Y-m-d'),
                'status' => 'ended',
                'total_price' => 200,
                'occupants' => 2,
                'is_confirmed' => true,
                'checkin_date' => Carbon::create('2023', '07', '17', '11', '11', '11', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => Carbon::create('2023', '07', '15', '10', '13', '01', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //22
            [
                'room_id' => 22,
                'user_id' => 9,
                'starting_date' => Carbon::createFromDate('2023', '07', '19')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '07', '24')->format('Y-m-d'),
                'status' => 'ended',
                'total_price' => 140,
                'occupants' => 2,
                'is_confirmed' => true,
                'checkin_date' => Carbon::create('2023', '07', '19', '12', '13', '14', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => Carbon::create('2023', '04', '29', '01', '18', '54', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //23
            [
                'room_id' => 23,
                'user_id' => 8,
                'starting_date' => Carbon::createFromDate('2023', '07', '21')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '07', '27')->format('Y-m-d'),
                'status' => 'ended',
                'total_price' => 100,
                'occupants' => 2,
                'is_confirmed' => true,
                'checkin_date' => Carbon::create('2023', '07', '21', '14', '23', '08', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => Carbon::create('2023', '06', '01', '11', '43', '58', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //24
            [
                'room_id' => 24,
                'user_id' => 7,
                'starting_date' => Carbon::createFromDate('2023', '07', '25')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '07', '31')->format('Y-m-d'),
                'status' => 'ended',
                'total_price' => 100,
                'occupants' => 2,
                'is_confirmed' => true,
                'checkin_date' => Carbon::create('2023', '07', '25', '14', '23', '08', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => Carbon::create('2023', '04', '30', '20', '13', '18', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            // Août
            //25
            [
                'room_id' => 25,
                'user_id' => 3,
                'starting_date' => Carbon::createFromDate('2023', '08', '01')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '08', '05')->format('Y-m-d'),
                'status' => 'ended',
                'total_price' => 120,
                'occupants' => 2,
                'is_confirmed' => true,
                'checkin_date' => Carbon::create('2023', '08', '01', '14', '55', '08', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => Carbon::create('2023', '04', '01', '22', '15', '08', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //26
            [
                'room_id' => 26,
                'user_id' => 4,
                'starting_date' => Carbon::createFromDate('2023', '08', '03')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '08', '08')->format('Y-m-d'),
                'status' => 'ended',
                'total_price' => 120,
                'occupants' => 2,
                'is_confirmed' => true,
                'checkin_date' => Carbon::create('2023', '08', '03', '22', '22', '22', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => Carbon::create('2023', '08', '03', '22', '19', '02', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //27
            [
                'room_id' => 27,
                'user_id' => 5,
                'starting_date' => Carbon::createFromDate('2023', '08', '05')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '08', '10')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => true,
                'checkin_date' => Carbon::create('2023', '08', '05', '10', '10', '11', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => Carbon::create('2023', '08', '05', '10', '15', '11', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //28
            [
                'room_id' => 28,
                'user_id' => 6,
                'starting_date' => Carbon::createFromDate('2023', '08', '07')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '08', '12')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 120,
                'occupants' => 2,
                'is_confirmed' => true,
                'checkin_date' => Carbon::create('2023', '08', '07', '12', '12', '11', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => Carbon::create('2023', '06', '17', '22', '01', '51', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //29
            [
                'room_id' => 29,
                'user_id' => 7,
                'starting_date' => Carbon::createFromDate('2023', '08', '09')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '08', '14')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => true,
                'checkin_date' => Carbon::create('2023', '08', '09', '12', '55', '11', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => Carbon::create('2023', '04', '19', '19', '45', '01', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //30
            [
                'room_id' => 30,
                'user_id' => 8,
                'starting_date' => Carbon::createFromDate('2023', '08', '11')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '08', '16')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //31
            [
                'room_id' => 31,
                'user_id' => 9,
                'starting_date' => Carbon::createFromDate('2023', '08', '13')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '08', '18')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //32
            [
                'room_id' => 32,
                'user_id' => 10,
                'starting_date' => Carbon::createFromDate('2023', '08', '15')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '08', '20')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 220,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //33
            [
                'room_id' => 33,
                'user_id' => 3,
                'starting_date' => Carbon::createFromDate('2023', '08', '17')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '08', '22')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //34
            [
                'room_id' => 1,
                'user_id' => 4,
                'starting_date' => Carbon::createFromDate('2023', '08', '19')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '08', '24')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //35
            [
                'room_id' => 2,
                'user_id' => 5,
                'starting_date' => Carbon::createFromDate('2023', '08', '21')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '08', '27')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //36
            [
                'room_id' => 3,
                'user_id' => 6,
                'starting_date' => Carbon::createFromDate('2023', '08', '25')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '08', '31')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //37
            [
                'room_id' => 4,
                'user_id' => 10,
                'starting_date' => Carbon::createFromDate('2023', '08', '01')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '08', '05')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 220,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //38
            [
                'room_id' => 5,
                'user_id' => 9,
                'starting_date' => Carbon::createFromDate('2023', '08', '03')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '08', '08')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 120,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //39
            [
                'room_id' => 6,
                'user_id' => 8,
                'starting_date' => Carbon::createFromDate('2023', '08', '05')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '08', '10')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 220,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //40
            [
                'room_id' => 7,
                'user_id' => 7,
                'starting_date' => Carbon::createFromDate('2023', '08', '07')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '08', '12')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //41
            [
                'room_id' => 8,
                'user_id' => 6,
                'starting_date' => Carbon::createFromDate('2023', '08', '09')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '08', '14')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //42
            [
                'room_id' => 9,
                'user_id' => 5,
                'starting_date' => Carbon::createFromDate('2023', '08', '11')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '08', '16')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //43
            [
                'room_id' => 10,
                'user_id' => 4,
                'starting_date' => Carbon::createFromDate('2023', '08', '13')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '08', '18')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //44
            [
                'room_id' => 11,
                'user_id' => 3,
                'starting_date' => Carbon::createFromDate('2023', '08', '15')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '08', '20')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //45
            [
                'room_id' => 12,
                'user_id' => 10,
                'starting_date' => Carbon::createFromDate('2023', '08', '17')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '08', '22')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //46
            [
                'room_id' => 13,
                'user_id' => 9,
                'starting_date' => Carbon::createFromDate('2023', '08', '19')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '08', '24')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //47
            [
                'room_id' => 14,
                'user_id' => 8,
                'starting_date' => Carbon::createFromDate('2023', '08', '21')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '08', '27')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //48
            [
                'room_id' => 15,
                'user_id' => 7,
                'starting_date' => Carbon::createFromDate('2023', '08', '25')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '08', '31')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            // Novembre
            //49
            [
                'room_id' => 16,
                'user_id' => 3,
                'starting_date' => Carbon::createFromDate('2023', '11', '01')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '11', '05')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //50
            [
                'room_id' => 17,
                'user_id' => 4,
                'starting_date' => Carbon::createFromDate('2023', '11', '03')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '11', '08')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 120,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //51
            [
                'room_id' => 18,
                'user_id' => 5,
                'starting_date' => Carbon::createFromDate('2023', '11', '05')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '11', '10')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //52
            [
                'room_id' => 19,
                'user_id' => 6,
                'starting_date' => Carbon::createFromDate('2023', '11', '07')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '11', '12')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 120,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //53
            [
                'room_id' => 20,
                'user_id' => 7,
                'starting_date' => Carbon::createFromDate('2023', '11', '09')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '11', '14')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //54
            [
                'room_id' => 21,
                'user_id' => 8,
                'starting_date' => Carbon::createFromDate('2023', '11', '11')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '11', '16')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //55
            [
                'room_id' => 11,
                'user_id' => 9,
                'starting_date' => Carbon::createFromDate('2023', '11', '13')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '11', '18')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //56
            [
                'room_id' => 33,
                'user_id' => 10,
                'starting_date' => Carbon::createFromDate('2023', '11', '15')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '11', '20')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 220,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //57
            [
                'room_id' => 3,
                'user_id' => 3,
                'starting_date' => Carbon::createFromDate('2023', '11', '17')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '11', '22')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //58
            [
                'room_id' => 4,
                'user_id' => 4,
                'starting_date' => Carbon::createFromDate('2023', '11', '19')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '11', '24')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //59
            [
                'room_id' => 5,
                'user_id' => 5,
                'starting_date' => Carbon::createFromDate('2023', '11', '21')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '11', '27')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //60
            [
                'room_id' => 6,
                'user_id' => 6,
                'starting_date' => Carbon::createFromDate('2023', '11', '25')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '11', '31')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //61
            [
                'room_id' => 10,
                'user_id' => 10,
                'starting_date' => Carbon::createFromDate('2023', '11', '01')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '11', '05')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 220,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //62
            [
                'room_id' => 29,
                'user_id' => 9,
                'starting_date' => Carbon::createFromDate('2023', '11', '03')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '11', '08')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 120,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //63
            [
                'room_id' => 25,
                'user_id' => 8,
                'starting_date' => Carbon::createFromDate('2023', '11', '05')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '11', '10')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 220,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //64
            [
                'room_id' => 23,
                'user_id' => 7,
                'starting_date' => Carbon::createFromDate('2023', '11', '07')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '11', '12')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //65
            [
                'room_id' => 16,
                'user_id' => 6,
                'starting_date' => Carbon::createFromDate('2023', '11', '09')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '11', '14')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //66
            [
                'room_id' => 14,
                'user_id' => 5,
                'starting_date' => Carbon::createFromDate('2023', '11', '11')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '11', '16')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //67
            [
                'room_id' => 1,
                'user_id' => 4,
                'starting_date' => Carbon::createFromDate('2023', '11', '13')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '11', '18')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //68
            [
                'room_id' => 12,
                'user_id' => 3,
                'starting_date' => Carbon::createFromDate('2023', '11', '15')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '11', '20')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //69
            [
                'room_id' => 10,
                'user_id' => 10,
                'starting_date' => Carbon::createFromDate('2023', '11', '17')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '11', '22')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //70
            [
                'room_id' => 8,
                'user_id' => 9,
                'starting_date' => Carbon::createFromDate('2023', '11', '19')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '11', '24')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //71
            [
                'room_id' => 7,
                'user_id' => 8,
                'starting_date' => Carbon::createFromDate('2023', '11', '21')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '11', '27')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //72
            [
                'room_id' => 3,
                'user_id' => 7,
                'starting_date' => Carbon::createFromDate('2023', '11', '25')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '11', '31')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            // Décembre
            //73
            [
                'room_id' => 30,
                'user_id' => 3,
                'starting_date' => Carbon::createFromDate('2023', '12', '01')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '12', '05')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //74
            [
                'room_id' => 28,
                'user_id' => 4,
                'starting_date' => Carbon::createFromDate('2023', '12', '03')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '12', '08')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 120,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //75
            [
                'room_id' => 3,
                'user_id' => 5,
                'starting_date' => Carbon::createFromDate('2023', '12', '05')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '12', '10')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //76
            [
                'room_id' => 29,
                'user_id' => 6,
                'starting_date' => Carbon::createFromDate('2023', '12', '07')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '12', '12')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 120,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //77
            [
                'room_id' => 5,
                'user_id' => 7,
                'starting_date' => Carbon::createFromDate('2023', '12', '09')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '12', '14')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //78
            [
                'room_id' => 6,
                'user_id' => 8,
                'starting_date' => Carbon::createFromDate('2023', '12', '11')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '12', '16')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //79
            [
                'room_id' => 11,
                'user_id' => 9,
                'starting_date' => Carbon::createFromDate('2023', '12', '13')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '12', '18')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //80
            [
                'room_id' => 12,
                'user_id' => 10,
                'starting_date' => Carbon::createFromDate('2023', '12', '15')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '12', '20')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 220,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //81
            [
                'room_id' => 3,
                'user_id' => 3,
                'starting_date' => Carbon::createFromDate('2023', '12', '17')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '12', '22')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //82
            [
                'room_id' => 4,
                'user_id' => 4,
                'starting_date' => Carbon::createFromDate('2023', '12', '19')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '12', '24')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //83
            [
                'room_id' => 5,
                'user_id' => 5,
                'starting_date' => Carbon::createFromDate('2023', '12', '21')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '12', '27')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //84
            [
                'room_id' => 6,
                'user_id' => 6,
                'starting_date' => Carbon::createFromDate('2023', '12', '25')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '12', '31')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //85
            [
                'room_id' => 33,
                'user_id' => 10,
                'starting_date' => Carbon::createFromDate('2023', '12', '01')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '12', '05')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 220,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //86
            [
                'room_id' => 29,
                'user_id' => 9,
                'starting_date' => Carbon::createFromDate('2023', '12', '03')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '12', '08')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 120,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //87
            [
                'room_id' => 25,
                'user_id' => 8,
                'starting_date' => Carbon::createFromDate('2023', '12', '05')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '12', '10')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 220,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //88
            [
                'room_id' => 23,
                'user_id' => 7,
                'starting_date' => Carbon::createFromDate('2023', '12', '07')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '12', '12')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //89
            [
                'room_id' => 16,
                'user_id' => 6,
                'starting_date' => Carbon::createFromDate('2023', '12', '09')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '12', '14')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //90
            [
                'room_id' => 14,
                'user_id' => 5,
                'starting_date' => Carbon::createFromDate('2023', '12', '11')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '12', '16')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //91
            [
                'room_id' => 6,
                'user_id' => 4,
                'starting_date' => Carbon::createFromDate('2023', '12', '13')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '12', '18')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //92
            [
                'room_id' => 12,
                'user_id' => 3,
                'starting_date' => Carbon::createFromDate('2023', '12', '15')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '12', '20')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //93
            [
                'room_id' => 10,
                'user_id' => 10,
                'starting_date' => Carbon::createFromDate('2023', '12', '17')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '12', '22')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //94
            [
                'room_id' => 8,
                'user_id' => 9,
                'starting_date' => Carbon::createFromDate('2023', '12', '19')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '12', '24')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //95
            [
                'room_id' => 7,
                'user_id' => 8,
                'starting_date' => Carbon::createFromDate('2023', '12', '21')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '12', '27')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //96
            [
                'room_id' => 3,
                'user_id' => 7,
                'starting_date' => Carbon::createFromDate('2023', '12', '25')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023', '12', '31')->format('Y-m-d'),
                'status' => 'ongoing',
                'total_price' => 70,
                'occupants' => 2,
                'is_confirmed' => false,
                'checkin_date' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
        ];
        Booking::insert($datas);
    }
}
