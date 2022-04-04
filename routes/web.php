<?php

use Illuminate\Http\Request;
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

    $methods = \App\Method::with('events')->get();

    return view('index', compact('methods', 'dates'));
});

Route::get('/reload-table', function () {
    // make an loop for month by month
    $today = today();
    $dates = [];

    for ($i = 1; $i < 6 + 1; ++$i) {
        $dates[] = \Carbon\Carbon::createFromDate($today->month, $i)->format('F');
    }

    $methods = \App\Method::with('events')->get();

    return view('table')->with(compact('methods', 'dates'));
});

Route::get('/show/{id}', function ($id) {
    $onlyEvent = \App\Event::find($id);
    $event = $onlyEvent->load('method');
    $methods = \App\Method::get();
    return view('modal.show', compact('event', 'methods'));
});

Route::get('/create', function () {
    $methods = \App\Method::get();
    return view('modal.create', compact('methods'));
});

Route::post('/store', function (Request $request) {
    if ($request->method_id === null) {
        $method = \App\Method::create([
            'name' => $request->name,
        ]);

        $resp = $method->events()->create([
            'name' => $request->event,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'method_id' => $method->id,
        ]);

        return $resp;
    } else {
        $resp = \App\Event::create([
            'name' => $request->event,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'method_id' => $request->method_id,
        ]);

        return $resp;
    }
});

Route::patch('/update/{id}', function (Request $request) {
    $event = \App\Event::find($request->id)->load('method');
    $event->update($request->all());
    return $event;
});

Route::delete('/delete/{id}', function (Request $request) {
    $event = \App\Event::find($request->id)->load('method');
    $event->delete();
    return $event;
});
