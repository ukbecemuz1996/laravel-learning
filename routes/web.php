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
    return view('welcome');
});

// Route::get

// pass a function as argument (Anonymous Function)
Route::get('/users', function () {
    $arr = [1, 2, 3, 4, 5];

    foreach ($arr as $value) {
        echo $value . "<br>";
    }
    return "Get All Users";
});

// Route::post

Route::post('/users', function () {
    $arr = [1, 2, 3, 4, 5];

    foreach ($arr as $value) {
        echo $value . "<br>";
    }
    return "Create New User";
});

// Route::put

Route::put('/users', function () {
    $arr = [1, 2, 3, 4, 5];

    foreach ($arr as $value) {
        echo $value . "<br>";
    }
    return "Update User";
});

// Route::delete

Route::delete('/users', function () {
    $arr = [1, 2, 3, 4, 5];

    foreach ($arr as $value) {
        echo $value . "<br>";
    }
    return "Delete User";
});

// Route::redirect

Route::redirect('/hello','/users',301);

// Route::view

/**
 * Routes Commands
 * - php artisan route:list
 * - php artisan route:list --path=api
 * - php artisan route:list --except-vendor
 * - php artisan route:list --only-vendor
 */

// Route Parameters

// Required Parameters

// Optional Parameters
// should be also optional as arguments

// Parameters Constraints

// whereIn
// whereNumber
// whereAlpha
// whereAlphaNumeric

// Named Routes

/**
 * Route Groups
 * - Middleware
 * - Controllers
 * - Subdomain Routing
 * - Route Prefixes
 * - Route Name Prefixes
 */

// Route Prefixes

// Route Name Prefixes

// Fallback Routes

// Route Caching
// route:cache
// route:clear

/**
 * ---------- Request ------------
 * $request->path()
 * $request->is()
 * $request->routeIs()
 * $request->url()
 * $request->fullUrl()
 * $request->fullUrlWithQuery()
 * $request->host()
 * $request->method()
 * $request->isMethod()
 * $request->header()
 * $request->hasHeader()
 * $request->ip()
 * $request->accepts([])
 * $request->all()
 * $request->collect()
 * $request->input()
 * $request->query()
 * $request->string()
 * $request->boolean()
 * $request->date()
 * $request->only()
 * $request->except()
 * $request->has()
 * $request->whenHas()
 * $request->hasAny()
 * $request->filled() //important
 * $request->whenFilled()
 * $request->missing()
 * $request->cookie()
 * $request->file()
 * $request->file()->isValid()
 * $request->file()->path()
 * $request->file()->extension()
 * $request->file()->store()
 * $request->hasFile()
 */

/**
 * ---------- Response ------------
 *  response()
 *  response()->header()
 *  response()->withHeaders([])
 *  response()->cookie()
 *  response()->withourCookie()
 *  response()->view()
 *  response()->view()->header()
 *  response()->download()
 *  response()->file()
 *  redirect()
 *  redirect()->route() //named route
 *  redirect()->away()
 */

/**
 * ---------- Views ------------
 * views('path',[values])
 * views('parent.child',[values])
 * views('path')->with('key','value')
 * php artisan view:cache
 * php artisan view:clear
 */
