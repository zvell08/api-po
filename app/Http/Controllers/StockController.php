<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all = Stock::all();

        return response()->json($all);
    }

    public function updateStock(Request $request, $productId)
    {
        // Validasi permintaan
        $request->validate([
            'stock' => 'required|integer',
            'harga' => 'required|integer',
        ]);

        $stock = $request->input('stock');
        $harga = $request->input('harga');


        // Cari produk berdasarkan ID
        $product = Stock::find($productId);

        // Jika produk ditemukan
        if ($product) {
            // Update stok
            $product->stock = $stock;
            $product->harga = $harga;
            $product->save();

            // Respon sukses
            return response()->json(['message' => 'Stock updated successfully']);
        } else {
            // Respon jika produk tidak ditemukan
            return response()->json(['message' => 'Product not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock $stock)
    {
        //
    }
}