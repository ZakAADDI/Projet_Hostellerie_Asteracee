<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\Nfc;
use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookingResource;
use App\Http\Repositories\RoomRepository;
use App\Http\Repositories\BookingRepository;
use App\Http\Resources\RoomResource;

use function PHPUnit\Framework\isEmpty;

class DashboardController extends Controller
{
    /**
     *
     * Display the specified resource.
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDashboardDatas()
    {
        $datas = [];

        // --- Nombres de chambres disponibles --- //
        // Liste des rooms
        $rooms = Room::get()->toArray();
        $rooms_quantity = count($rooms);

        // Liste des bookings occupés
        $bookings = BookingRepository::getCurrentBookings();

        // Nombres de chambres occupées
        $occupied_rooms_quantity = count($bookings);

        // Chambres disponibles
        $available_rooms = $rooms_quantity - $occupied_rooms_quantity;
        $datas['available_rooms'] = $available_rooms;

        // --- Nombres de clés en cours d'utilisation --- //
        $current_nfcs_used = count(Nfc::whereIn('booking_id', $bookings->pluck('id'))->get());
        $datas['nfc_cards_in_use'] = $current_nfcs_used;

        // --- % occupation actuel --- //
        $occupancy_rate = round(($occupied_rooms_quantity / $rooms_quantity * 100), 2);
        $datas['occupancy_rate'] = $occupancy_rate;

        // --- Récupérer les données concernant les chambres --- //
        $rooms = Room::all();
        $allRoomsData = [];

        $roomInUseIds = $bookings->pluck('room_id')->toArray();

        foreach ($rooms as $room) {

            $booking = $bookings->where('room_id', $room->id)->first();
            $customer = ($booking == null ? '-' : ($booking->getUser->lastname . ' ' . $booking->getUser->firstname));
            $booking_ending_date = ($booking == null ? '-' : $booking->ending_date);
            // dd($customer);

            // - N° (numéro de la chambre)
            // - Type (type de la chambre)
            // - Statut (libre ou occupée)
            // - Client (NOM et prénom du client)
            // - Libre le (date de fin de booking)
            $roomData = [
                'room_number' => $room->room_number,
                'room_type' => $room->getRoomType->name,
                'status' => in_array($room->id, $roomInUseIds) ? 'Occupée' : 'Libre',
                'client' => $customer,
                'available' => $booking_ending_date

            ];
            $allRoomsData[] = $roomData;
        }

        $datas['rooms_informations'] = $allRoomsData;


        return response()->json($datas);
    }

    /**
     *
     * Display the specified resource.
     * @return \Illuminate\Http\JsonResponse
     */
    public function getBookingsDatas()
    {
        return 'getBookingsDatas';
    }

    /**
     *
     * Display the specified resource.
     * @return \Illuminate\Http\JsonResponse
     */
    public function getEfficiencyDatas()
    {
        return 'getEfficiencyDatas';
    }
}
