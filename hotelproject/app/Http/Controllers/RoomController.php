<?php
/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

/**
 * Class HotelController
 * @package App\Http\Controllers
 */

class RoomController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        return view('adminlte::home');
    }
    

    public function roomManagementView()
    {
        $hotelsList = DB::table('hotels')->get();
        return view('hotelmanagement.room_manage', compact('hotelsList'));
    }

    public function searchRooms(Request $request)
    {
        $rooms = DB::table('rooms')
            ->join('hotels', 'hotels.id', '=', 'rooms.hotel_id')
            ->select('hotels.name AS hotel_name', 'rooms.*')
            ->where('rooms.name', 'LIKE', '%'. $request->type .'%')
            ->where('hotels.name', 'LIKE', '%'. $request->hotel .'%')
            ->orderBy('rooms.id', 'DESC')
            ->paginate(6);
        $roomsTable = view('hotelmanagement.components.room.room_table', compact('rooms'))->render();
        return response()->json(['roomsTable' => $roomsTable]);
    }

    //delete
    public function deleteRoom()
    {
        $result = DB::table('rooms')->where('id', request()->id)->delete();
        if($result) {
            return response()->json([
                'status' => 'success',
                'message' => 'Xóa thành công!'
            ]);
        }
        return response()->json([
            'status' => 'fail',
            'message' => 'Xóa thất bại!'
        ]);
    }

    public function showRoom()
    {
        $room = DB::table('rooms')->where('id', request()->id)->first();
        return response()->json($room);
    }

    //create
    public function storeRoom(Request $request)
    {
        $message = [
            'required' => 'Không được để trống!',
            'max:15' => 'Được điền tối đa 15 kí tự!',
            'max:35' => 'Được điền tối đa 35 kí tự!',
            'integer' => 'Chỉ được phép nhập kí tự là số',
        ];

        $rules = [
            'name' => 'required|max:15',
            'room_type' => 'required|max:15',
            'price' => 'required|integer',
            'hotel_id' => 'required|max:35',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $result = DB::table('rooms')
            ->updateOrInsert(
                ['id' => $request->id],
                [
                    'name' => $request->name,
                    'room_type' => $request->room_type,
                    'hotel_id' => $request->hotel_id,
                    'price' => $request->price,
                ]
            );

        if($result) {
            return response()->json([
                'status' => 'success',
                'message' => 'Cập nhật thành công!'
            ]);
        }
        return response()->json([
            'status' => 'fail',
            'message' => 'Cập nhật thất bại!'
        ]);
    }
}
