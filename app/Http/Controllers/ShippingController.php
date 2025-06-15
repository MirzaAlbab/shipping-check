<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function index()
    {
        // Logic to handle shipping operations
        $provinces = \App\Models\Province::pluck('name', 'code');
        $couriers = \App\Models\Courier::pluck('name', 'code');
        return view('shipping', compact('provinces', 'couriers'));
    }

    public function getCitiesByProvince($code)
    {
        $cities = City::where('province_id', $code)->pluck('name', 'code');
        return response()->json($cities);
    }

    public function searchCities(Request $request)
    {
        $search = trim($request->search);

        if (empty($search)) {
            $cities = City::orderBy('name', 'asc')
                ->select('id', 'name')
                ->limit(5)->get();
        } else {
            $cities = City::orderBy('name', 'asc')
                ->where('name', 'like', '%' . $search . '%')
                ->select('id', 'name')
                ->limit(5)->get();
        }

        $response  = [];

        foreach ($cities as $city) {
            $response[] = ['id' => $city->id, 'text' => $city->name];
        }

        return json_encode($response);
    }
}
