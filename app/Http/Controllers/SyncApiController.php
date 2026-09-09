<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SyncApiController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'investor_portfolios' => ['required', 'array'],
            'fund_performance' => ['required', 'array'],
            'fund_summary' => ['required', 'array'],
        ]);

        $tableMap = [
            'investor_portfolios' => 'tbl_investorportfolios',
            'fund_performance' => 'tbl_fundperformance',
            'fund_summary' => 'tbl_fundsummary',
        ];        

        // DB::table('tbl_investorportfolios')->upsert(
        //     $validated['records'],
        //     ['fund_code', 'as_of_date'],
        //     [
        //         'unit_holding',
        //         'total_cost_bdt',
        //         'current_market_value_bdt',
        //         'unrealized_gain_loss_bdt',
        //         'updated_at',
        //     ]
        // );

        return response()->json([
            'status' => 'ok',
            'count' => count($validated['records']),
            'records' => $validated['records'],
        ]);
    }



    ## FOR TESTING PURPOSES ##
    // public function store(Request $request)
    // {
    //     return response()->json([
    //         'status' => 'ok',
    //         'message' => 'Sync API endpoint is working',
    //         'received_at' => now()->toIso8601String(),
    //         'records' => [
    //             [
    //                 'fund_code' => 'HFUF',
    //                 'as_of_date' => '2026-09-09',
    //                 'unit_holding' => 10000.0000,
    //                 'total_cost_bdt' => 100000.00,
    //                 'current_market_value_bdt' => 112500.00,
    //                 'unrealized_gain_loss_bdt' => 12500.00,
    //             ],
    //         ],
    //     ]);
    // }

}