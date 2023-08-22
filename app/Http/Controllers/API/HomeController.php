<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Room;
use App\Models\Property;

class HomeController extends Controller
{
    //
     public function search()
    {
        try {
            $data['success'] = true;

            //get the booked rooms where check_out is not between request()->check_in and request()->check_out
            $booked_rooms = array_merge(
                Room::join('orders', 'rooms.id', '=', 'orders.room_id')
                    ->whereBetween('orders.check_in_date', [request()->check_in, request()->check_out])
                    ->get()->toArray(),
                Room::join('orders', 'rooms.id', '=', 'orders.room_id')
                    ->whereBetween('orders.checko_out_date', [request()->check_in, request()->check_out])
                    ->get()->toArray()
            );

            //get ids of all booked rooms so we can filter them
            $booked_rooms_ids = collect($booked_rooms)->pluck('room_id');

            // dd($booked_rooms_ids);
            //get available rooms
            $available_rooms = Room::when(request()->guest != null, function ($query) {
                return $query->where('total_guests', '>=', request()->guest);
            })->select('id')->whereNotIn('id', $booked_rooms_ids)->get();
            // dd($available_rooms);
            //get the hotels that meet the criteria
            $data =  Property::join('rooms', 'properties.id', '=', 'rooms.property_id')->when(request()->address != null, function ($query) {
                  return $query->where('address', 'like','%'.request()->address .'%');})->whereIn('rooms.id', $available_rooms)->paginate(6);

                // dd($data);
        } catch (\Throwable $th) {
            $data['success'] = false;
        }
        return response()->json(['data' => $data]);
    }

    public function newSearch(Request $request)
    {
        dd($request->all());
    }
}
