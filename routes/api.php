<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

$Service = 'payment';

Route::group([
    'prefix' => $Service
], function () {
    Route::get('', function () {
        return response()->json([
            'msg' => "Beep Beep Service payment is online"
        ]);
    });

    Route::get('list', function () {
        return response()->json([
            'data' => [
                [
                    'name' => 'Xendit',
                    'country' => 'Malaysia'
                ],
                [
                    'name' => 'BRI',
                    'country' => 'Indonesia'
                ],
                [
                    'name' => 'BNIS',
                    'country' => 'Filiphina'
                ],
                [
                    'name' => 'BCA',
                    'country' => 'China'
                ],
                [
                    'name' => 'Fazzpay',
                    'country' => 'Timor-Timor'
                ]
            ]
        ]);
    });
});
