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
class HotelController extends Controller
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

    public function hotelManagementView()
    {
        return view('hotelmanagement.hotel_manage');
    }

    public function searchHotels(Request $request)
    {
        $hotels = DB::table('hotels')
            ->where('name', 'LIKE', '%'. $request->search .'%')
            ->orWhere('city', 'LIKE', '%'. $request->search .'%')
            ->orWhere('address', 'LIKE', '%'. $request->search .'%')
            ->orderBy('id', 'DESC')
            ->paginate(6);
        $hotelsTable = view('hotelmanagement.components.hotel_table', compact('hotels'))->render();
        return response()->json(['hotelsTable' => $hotelsTable]);
    }

    public function deleteHotel()
    {
        $result = DB::table('hotels')->where('id', request()->id)->delete();
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

    public function showHotel()
    {
        $hotel = DB::table('hotels')->where('id', request()->id)->first();
        return response()->json($hotel);
    }

    public function storeHotel(Request $request)
    {
        $message = [
            'required' => 'Không được để trống!',
            'max:15' => 'Được điền tối đa 15 kí tự!',
            'max:35' => 'Được điền tối đa 35 kí tự!',
            'integer' => 'Chỉ được phép nhập kí tự là số',
        ];

        $rules = [
            'name' => 'required|max:35',
            'city' => 'required|max:15',
            'address' => 'required|max:35',
            'phone' => 'required|integer',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $result = DB::table('hotels')
            ->updateOrInsert(
                ['id' => $request->id],
                [
                    'name' => $request->name,
                    'city' => $request->city,
                    'address' => $request->address,
                    'phone' => $request->phone,
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
