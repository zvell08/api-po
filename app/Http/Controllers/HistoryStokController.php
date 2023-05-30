<?php

namespace App\Http\Controllers;


use App\Models\history_stok;
use Illuminate\Http\Request;

class HistoryStokController extends Controller
{

    public function historyStock(Request $request, history_stok $history_stok)
    {
        $history_stok->history_stok = $request->history_stok;
        $history_stok->save();

        return response()->json([
            'data' => $history_stok
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(history_stok $history_stok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(history_stok $history_stok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, history_stok $history_stok)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(history_stok $history_stok)
    {
        //
    }
}