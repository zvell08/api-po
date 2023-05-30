<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ForcaseController extends Controller
{
    public function forcase()
    {
        // Mengambil Data Historis dari Database
        $historicalDemand = DB::table('history_demands')->pluck('history_demand');

        // Mengambil Data Terkini dari Database
        $currentDemand = DB::table('demands')->value('jumlah_demand');
        $currentStock = DB::table('stocks')->value('stock');

        // Menghitung Peramalan Permintaan
        $forecast = $historicalDemand->avg();

        // Menghitung Peramalan Persediaan
        $forecastStock = $currentDemand - $forecast + $currentStock;

        // Mengembalikan hasil dalam format JSON
        return response()->json([
            'forcast_stock' => $forecastStock,
        ]);

    }
}