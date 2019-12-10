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
class ServiceController extends Controller
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

    public function serviceManagementView()
    {
        return view('hotelmanagement.service_manage');
    }

    public function searchServices(Request $request)
    {
        $services = DB::table('service')
            ->where('name', 'LIKE', '%'. $request->search .'%')
            ->orWhere('price', 'LIKE', '%'. $request->search .'%')
            ->orderBy('id', 'DESC')
            ->paginate(6);
        $servicesTable = view('hotelmanagement.components.service_table', compact('services'))->render();
        return response()->json(['servicesTable' => $servicesTable]);
    }

    public function deleteService()
    {
        $result = DB::table('service')->where('id', request()->id)->delete();
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

    public function showService()
    {
        $service = DB::table('service')->where('id', request()->id)->first();
        return response()->json($service);
    }

    public function storeService(Request $request)
    {
        $message = [
            'required' => 'Không được để trống!',
            'max:25' => 'Được điền tối đa 25 kí tự!',
            'integer' => 'Chỉ được phép nhập kí tự là số',
        ];

        $rules = [
            'name' => 'required|max:25',          
            'price' => 'required|integer',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $result = DB::table('service')
            ->updateOrInsert(
                ['id' => $request->id],
                [
                    'name' => $request->name,
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
