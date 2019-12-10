<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function customerView() {
        return view('hotelmanagement.customer_manage');
    }

    public function customerShow(Request $request) {
        $customer = DB::table('customers')->where('id', $request->id)->first();
        return response()->json($customer);
    }
    public function customerStore(Request $request) {
        $message = [
            'required' => 'Không được để trống!',
            'integer' => 'Chỉ được phép nhập kí tự là số',
        ];

        $rules = [
            'name' => 'required|max:15',
            'phone' => 'required|integer',
            'card' => 'required|integer'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $result = DB::table('customers')
            ->updateOrInsert(
                ['id' => $request->id],
                [
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'card' => $request->card
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

    public function customerDelete(Request $request) {
        $result = DB::table('customers')->where('id',$request->id)
        ->delete();
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

    public function searchCustomer(Request $request) {

        $customers = DB::table('customers')
            ->where('name', 'LIKE', '%'. $request->search .'%')
            ->orWhere('phone', 'LIKE', '%'. $request->search .'%')
            ->orWhere('card', 'LIKE', '%'. $request->search .'%')
            ->orderBy('id', 'DESC')
            ->paginate(6);
        $customersTable = view('hotelmanagement.components.customer_table', compact('customers'))->render();
        return response()->json(['customersTable' => $customersTable]);    
    }
}
