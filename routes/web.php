<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return response()->json([
        'status' => 'ok'
    ]);
});

$app->get('/quote', function () {

    $quote = \App\Models\Quote::inRandomOrder()->first();

    return response()->json([
        'quote' => $quote->text
    ]);
});

$app->post('/quote', function (\Illuminate\Http\Request $request) {

    $quote = \App\Models\Quote::create(['text' => $request->input('text')]);

    return response()->json([
        'quote' => $quote->text
    ]);
});

$app->post('/quote/{id}/delete', function ($id) {

    \App\Models\Quote::destroy($id);

    $quote = \App\Models\Quote::inRandomOrder()->first();

    return response()->json([
        'quote' => $quote->text
    ]);
});


