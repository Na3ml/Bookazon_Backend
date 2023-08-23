<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\RoomResource;
use App\Models\City;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Room;
use App\Models\Property;
use function inclued\sendError;
use function inclued\sendResponse;

class HomeController extends Controller
{
    //


    public function newSearch(Request $request)
    {
//        dd($request->check_in);
        $ids = Order::where('check_in_date',$request->check_in)->orWhere('check_out_date',$request->check_in)->orWhere('check_in_date',$request->check_out)
            ->pluck('room_id');

        if($request->has('city')){
            $city_id = City::where('name', 'like', '%'.$request->city.'%')->pluck('id','name')->first();
        }
//        dd($city_id);
        $rooms = City::where('id',$city_id)->with('rooms')->latest()->get();
//        dd($rooms);
        $rooms = $rooms->whereNotIn('id',$ids)->where('total_guests', '<=', $request->guests);
//        dd($rooms);





       return sendResponse(RoomResource::collection($rooms),'');
//        $id = $ids->where('check_in_date',$request->check_in);
//        dd($rooms);
    }
}
