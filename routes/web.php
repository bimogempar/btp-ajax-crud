<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // make an loop for month by month
    $today = today();
    $dates = [];

    for ($i = 1; $i < 6 + 1; ++$i) {
        $dates[] = \Carbon\Carbon::createFromDate($today->month, $i)->format('F');
    }

    $methods = \App\Method::all();
    $events = \App\Event::all();

    return view('test', compact('methods', 'events', 'dates'));
});
