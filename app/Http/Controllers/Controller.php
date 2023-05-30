<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function forcase()
    {
        // Mengambil Data Historis dari Database
        $historicalDemand = DB::table('history_demands')->pluck('history_demand');

        // Mengambil Data Terkini dari Database
        $currentDemand = DB::table('demands')->orderBy('id')->value('jumlah_demand');
        $currentStock = DB::table('stocks')->orderBy('id')->value('stock');

        // Menghitung Peramalan Permintaan
        $forecast = $historicalDemand->avg();

        // Menghitung Peramalan Persediaan
        $forecastStock = $currentDemand - $forecast + $currentStock;

        // Mengembalikan hasil dalam format JSON
        return response()->json([
            'forecast_stock' => $forecastStock,
        ]);

    }
}