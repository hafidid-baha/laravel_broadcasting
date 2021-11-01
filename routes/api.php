<?php

use App\Events\SubscribeEvent;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\isNull;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/subscribe', function (Request $request) {
    //
    $hash = $request->hash;
    $subscriber = Subscriber::where("hash", $hash)->first();
    if ($subscriber != null && $subscriber->available == 0) {
        $subscriber->available = 1;
        $subscriber->save();
        event(new SubscribeEvent($hash));
    }
    return response()->json(
        [
            "data" => "everything is ok"
        ]
    );
});
