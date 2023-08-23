<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\RoomResource;
use App\Models\City;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Room;
use App\Models\Property;
use Tymon\JWTAuth\Facades\JWTAuth;
use function inclued\sendError;
use function inclued\sendResponse;

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
            //get the hotels that meet the criteria]
            $city_name = request()->city;
            $city  = City::where('name',$city_name )->get();
            // dd($city);
            foreach($city as $item){
                $pro = $item->rooms;
            }
            foreach($pro as $pr){
                $prop = $pr->property;
            }
            dd($prop);

            $data =  Property::join('rooms', 'properties.id', '=', 'rooms.property_id')->when(request()->address != null, function ($query,$city) {
                  return $query->where('city',$city );})->whereIn('rooms.id', $available_rooms)->paginate(6);


        } catch (\Throwable $th) {
            $data['success'] = false;
        }
        return response()->json(['data' => $data]);
    }

    public function newSearch(Request $request)
    {
        $ids = Order::where('check_in_date',$request->check_in)->orWhere('checko_out_date',$request->check_in)->orWhere('check_in_date',$request->check_out)
            ->pluck('room_id');

        if($request->has('city')){
            $city = City::with('rooms')->where('name', 'like', '%'.$request->city.'%')->first();
        }
        $rooms = $city->rooms;
        $rooms = $rooms->whereNotIn('id',$ids)->where('total_guests',$request->total_guests);
        if (count($rooms) > 0){
            return sendResponse(RoomResource::collection($rooms),'good');
        }
        return sendError('','sorry no more room available , please try again');
    }

    public function book(Request $request){
         $user = User::find(JWTAuth::parseToken()->authenticate()->id);
         return $user;
         dd($request->all());
    }
}
