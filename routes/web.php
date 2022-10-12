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

Route::redirect('/hello', '/users', 301);

// Route::view

/**
 * Routes Commands
 * - php artisan route:list
 * - php artisan route:list --path=api
 * - php artisan route:list --except-vendor
 * - php artisan route:list --only-vendor
 */

// Route Parameters

Route::get('/users/{userId}', function ($userId) {

    return "Single User With ID: " . $userId;
});

// Required Parameters

Route::get('/required-parameter/{id}', function ($id) {

    return "Required Parameter with id: " . $id;
});

// Optional Parameters
// should be also optional as arguments

Route::get('/optional-parameter/{id?}', function ($id = null) {
    if (is_null($id)) {
        return "Optional Parameter not found";
    } else {
        return "Optional Parameter with id: " . $id;
    }
});

Route::get('/teachers/{id?}', function ($id = null) {
    if (is_null($id)) {
        return "Read All Teachers";
    } else {
        return "Single Teacher with id: " . $id;
    }
});

// Parameters Constraints

// whereIn
// whereNumber
// whereAlpha
// whereAlphaNumeric

Route::get('/numeric-id/{id}', function ($id) {
    return "Numeric ID with id: " . $id;
})->whereNumber('id');

Route::get('/string-id/{id}', function ($id) {
    return "String ID with id: " . $id;
})->whereAlpha('id');

Route::get('/posts/{postSlug}', function ($postSlug) {
    return "Post with slug: " . $postSlug;
})->whereAlpha('postSlug');

Route::get('/array/{id}', function ($id) {
    return "Array with id: " . $id;
})->whereIn('id', ['one', 'two', 'three']);

// Named Routes

Route::post('/managers', function () {
    return "Create New Manager";
})->name('manager.create');

Route::get('/managers', function () {
    return "Read All Managers";
})->name('manager.read.all');

Route::get('/managers/{id}', function ($id) {
    return "Read Single Manager With ID: " . $id;
})->name('manager.read')->whereNumber('id');

Route::put('/managers/{id}', function ($id) {
    return "Update Manager With ID: " . $id;
})->name('manager.update');

Route::delete('/managers/{id}', function ($id) {
    return "Delete Manager With ID: " . $id;
})->name('manager.delete');

/**
 * Route Groups
 * - Middleware
 * - Controllers
 * - Subdomain Routing
 * - Route Prefixes
 * - Route Name Prefixes
 */

// Route Prefixes

Route::prefix('admin')->group(function () {
    Route::get('/doctors', function () {
        return "Read All Doctors";
    });
    Route::get('/doctors/{id}', function ($id) {
        return "Read Single Doctor With ID: " . $id;
    });
});

// Route Name Prefixes

Route::prefix('test')->group(function () {
    Route::name('patient.')->group(function () {
        Route::get('/patients', function () {
            return "Read All Patients";
        })->name("read.all"); // patient.read.all

        Route::get('/patients/{id}', function ($id) {
            return "Read Single Patient With ID: " . $id;
        })->name("read");
    });
});

// Fallback Routes

Route::fallback(function () {
    return "404 Not Found";
});

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

Route::get('/tmp-request', function (Request $request) {

    // foreach ($request->query() as $key => $value) {
    //     echo $key . "=>" . $value . "<br>";
    // }

    // echo $request->query("dewde") . "<br>";
    // echo "------------ <br>";
    // foreach ($request->cookie() as $key => $value) {
    //     echo $key . "=>" . $value . "<br>";
    // }

    // echo $request->query("gender", "male") . "<br>";

    // echo $request->path() . "<br>";
    // echo $request->url() . "<br>";
    // echo $request->fullUrl() . "<br>"; //with query parameters
    // echo $request->host() . "<br>";
    // echo $request->getPort() . "<br>";
    // echo $request->method() . "<br>";

    foreach ($request->header() as $key => $value) {
        echo $key . "=>" . $value[0] . "<br>";
    }

    return "Tmp Request";
});

Route::post('/tmp-request', function (Request $request) {

    foreach ($request->input() as $key => $value) {
        echo $key . "=>" . $value . "<br>";
    }

    // echo $request->input("first_name") . "<br>";
    // echo $request->input("hobby","writing") . "<br>";
    // echo $request->date("date") . "<br>";
    // var_dump($request->date("date"));
    // var_dump($request->boolean("married"));

    // foreach ($request->only(['first_name', 'last_name']) as $key => $value) {
    //     echo $key . "=>" . $value . "<br>";
    // }

    // foreach ($request->except(['first_name']) as $key => $value) {
    //     echo $key . "=>" . $value . "<br>";
    // }

    // if ($request->has(['first_name','last_name'])) {
    //     echo $request->input('first_name') . "<br>";
    // }

    // $request->whenHas('first_name', function ($value) {
    //     echo $value . " Found <br>";
    // }, function () {
    //     echo "first_name not Found <br>";
    // });

    // if ($request->hasAny(['first_name', 'dewdw'])) {
    //     echo "Found <br>";
    // }

    // if ($request->filled('not_filled')) {
    //     echo "Filled <br>";
    // }

    // echo "------------ <br>";
    // foreach ($request->cookie() as $key => $value) {
    //     echo $key . "=>" . $value . "<br>";
    // }

    // echo $request->cookie('laravel_session'). "<br>";

    // var_dump($request->file('id_card'));
    // if ($request->hasFile('id_card')) {
    //     echo "Found <br>";
    // }

    echo "<br>";
    return "Tmp Post Request";
});

Route::get('/calculator', function (Request $request) {
    $num1 = $request->query('num1');
    $num2 = $request->query('num2');
    $operation = $request->query('operation');

    switch ($operation) {
        case 'add':
            return $num1 + $num2;
        case 'sub':
            return $num1 - $num2;
        case 'mul':
            return $num1 * $num2;
        case 'div':
            return $num1 / $num2;
        default:
            return "Operation Type Is Not Correct";
    }
});

Route::post('/calculator', function (Request $request) {
    $num1 = $request->input('num1');
    $num2 = $request->input('num2');
    $operation = $request->input('operation');

    switch ($operation) {
        case 'add':
            return $num1 + $num2;
        case 'sub':
            return $num1 - $num2;
        case 'mul':
            return $num1 * $num2;
        case 'div':
            return $num1 / $num2;
        default:
            return "Operation Type Is Not Correct";
    }
});

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

Route::get('/response', function () {
    $headers = [
        'name' => 'okba',
    ];

    return response('Response', 400, $headers);
});

Route::get('/response2', function () {

    return response('Response2', 200)
        ->header('name', 'okba')
        ->header('surename', 'cemuz');
});

Route::get('/response3', function () {

    return response('Response3', 200)
        ->withHeaders([
            'name' => 'okba',
            'surename' => 'cemuz',
        ]);
});

Route::get('/response4', function (Request $request) {

    echo $request->cookie('name');

    return response('Response4', 200)
        ->cookie('name', 'okba');
});

Route::get('/response5', function (Request $request) {

    $c = cookie('surename', 'cemuz');

    return response('Response5', 200)
        ->cookie($c);
});

Route::get('/response6', function (Request $request) {

    $c1 = cookie('num1', '5');

    return response('Response6', 200)
        ->withCookie($c1);
});

Route::get('/response7', function (Request $request) {

    return redirect('/response');
});

Route::get('/response8', function (Request $request) {

    return redirect()->route('manager.read.all');
});

Route::get('/response9', function (Request $request) {

    return redirect()->route('manager.read', ['id' => 5]);
});

Route::get('/response10', function (Request $request) {

    return redirect()->away('https://www.google.com');
});

Route::get('/response11', function (Request $request) {

    return response()->download('test.txt');
});

Route::get('/response12', function (Request $request) {

    return response()->file('villaroma-po.pdf', ['Content-Type' => 'application/pdf']); //mime
});

Route::get('/response13', function (Request $request) {

    return response()->file('test.xml', ['Content-Type' => 'text/xml']); //mime
});

/**
 * ---------- Views ------------
 * views('path',[values])
 * views('parent.child',[values])
 * views('path')->with('key','value')
 * php artisan view:cache
 * php artisan view:clear
 */

Route::get('/users-view', function () {
    return view('users');
});

Route::post('/users-view', function () {
    return view('users-post');
});

Route::get('/view-with-data', function (Request $request) {
    $pageTitle = $request->query('pageTitle');
    $arr = [
        1, 2, 3, 4,
    ];
    return view('with-data', ['title' => $pageTitle, 'arr' => $arr]);
});


// class Test
// {

//     public function get()
//     {
//         echo "get";
//         return $this;
//     }

//     public function post()
//     {
//         echo "post";
//         return $this;
//     }

//     public function where()
//     {
//         echo "where";
//         return $this;
//     }
// }

//  $test = new Test();

//  $test->get()->where();
