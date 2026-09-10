<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SyncApiController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Acc_tblAccPeriod' => ['required', 'array'],
            'Acc_tblAccType' => ['required', 'array'],
        ]);    
        
        // foreach ($validated as $tableName => $records) {
        //     DB::table($tableName)->insert($records);
        // }  

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
            'count' => count($validated['Acc_tblAccPeriod']),
            'Acc_tblAccPeriod' => $validated['Acc_tblAccPeriod'],
            'Acc_tblAccPeriod' => $validated['Acc_tblAccType'],
            'data' => $validated,
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