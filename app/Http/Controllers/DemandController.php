<?php

namespace App\Http\Controllers;

use App\Models\demand;
use Illuminate\Http\Request;

class DemandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all = Demand::all();

        return response()->json($all);
    }

    public function updateDemand(Request $request, $demandId)
    {
        // Validasi permintaan
        $request->validate([
            'jumlah_demand' => 'required|integer',
        ]);

        $demand = $request->input('jumlah_demand');


        // Cari produk berdasarkan ID
        $product = demand::find($demandId);

        // Jika produk ditemukan
        if ($product) {
            // Update stok
            $product->jumlah_demand = $demand;
            $product->save();

            // Respon sukses
            return response()->json(['message' => 'Stock updated successfully']);
        } else {
            // Respon jika produk tidak ditemukan
            return response()->json(['message' => 'Product not found'], 404);
        }
    }
}