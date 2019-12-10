<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BusinessController extends Controller
{
    public function businessManagementView()
    {
        $hotelsList = DB::table('hotels')->pluck('name');
        return view('hotelmanagement.business_manage', compact('hotelsList'));
    }

    public function searchBills(Request $request)
    {
        $bills = DB::table('bill')->groupBy('created_at')
            ->select(DB::raw('price_room + price_service'))
            ->whereBetween('created_at', [$request->star_date, $request->end_date])
            ->orderBy('created_at', 'ASC')
            ->paginate(9);
        $businessTable = view('hotelmanagement.components.business_table', compact('bills'))->render();
        return response()->json(['businessTable' => $businessTable]);
    }
}
