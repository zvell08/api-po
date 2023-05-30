<?php

namespace App\Http\Controllers;

use App\Models\history_demand;
use Illuminate\Http\Request;

class HistoryDemandController extends Controller
{

    public function historyDemand(Request $request, history_demand $history_demand)
    {
        $history_demand->history_demand = $request->history_demand;
        $history_demand->save();

        return response()->json([
            'data' => $history_demand
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(history_demand $history_demand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(history_demand $history_demand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, history_demand $history_demand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(history_demand $history_demand)
    {
        //
    }
}