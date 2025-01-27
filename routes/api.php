<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Job;
use App\Models\Location;
use App\Models\Role;
use App\Models\City;
use App\Models\Event;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;


Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);
Route::middleware('auth:sanctum')->post('/auth/logout', [AuthController::class, 'logout']);


Route::middleware('auth:sanctum')->group(function() {
    
});



/**
 * Authentication Routes
 */

// Route::post('/login', [AuthController::class, 'login'])->name('login');
// Route::post('/register', [AuthController::class, 'register']);

/**
 * User Routes
 */
// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/users', function () {
//         return User::select('name', 'email', 'created_at')->get();
//     });
// });

Route::get('/users', function () {
    return User::select('firstname', 'lastname', 'email', 'created_at')->get();
});

/**
 * Event Routes
 */
// Route::middleware('auth:sanctum')->group(function () {
    Route::get('/events', function () {
        return Event::all();
    });

    Route::get('/events/{id}', function ($id) {
        return Event::findOrFail($id);
    });

    Route::post('/events', function (Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        $event = Event::create($validated);
        return response()->json($event, 201);
    });

    Route::put('/events/{id}', function (Request $request, $id) {
        $event = Event::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'sometimes|required|date',
        ]);

        $event->update($validated);
        return response()->json($event, 200);
    });

    Route::delete('/events/{id}', function ($id) {
        $event = Event::findOrFail($id);
        $event->delete();
        return response()->json(null, 204);
    });
// });

/**
 * Job Routes
 */
// Route::middleware('auth:sanctum')->group(function () {
    Route::get('/jobs', function () {
        return Job::with(['user', 'location'])->get();
    });

    Route::get('/jobs/{id}', function ($id) {
        return Job::with(['user', 'location'])->findOrFail($id);
    });

    Route::post('/jobs', function (Request $request) {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'description' => 'required|string',
            'location_id' => 'required|exists:locations,id',
            'fee' => 'required|numeric|min:0',
        ]);

        $job = Job::create($validated);
        return response()->json($job, 201);
    });

    Route::put('/jobs/{id}', function (Request $request, $id) {
        $job = Job::findOrFail($id);

        $validated = $request->validate([
            'user_id' => 'sometimes|required|exists:users,id',
            'description' => 'sometimes|required|string',
            'location_id' => 'sometimes|required|exists:locations,id',
            'fee' => 'sometimes|required|numeric|min:0',
        ]);

        $job->update($validated);
        return response()->json($job, 200);
    });

    Route::delete('/jobs/{id}', function ($id) {
        $job = Job::findOrFail($id);
        $job->delete();
        return response()->json(null, 204);
    });

    // get all jobs joined with users table and use DB raw
    Route::get('/jobusers', function () {
        return
            DB::select(
                DB::raw(
                    'SELECT * FROM jobs
                    JOIN users ON jobs.user_id = users.id'
                )
            );
    });

// });

/**
 * Location Routes
 */
// Route::middleware('auth:sanctum')->group(function () {
    Route::get('/locations', function () {
        return Location::all();
    });

    Route::post('/locations', function (Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'city' => 'required|string|max:255',
        ]);

        $location = Location::create($validated);
        return response()->json($location, 201);
    });
// });

/**
 * Role Routes
 */
// Route::middleware('auth:sanctum')->group(function () {
    Route::get('/roles', function () {
        return Role::all();
    });

    Route::post('/roles', function (Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:roles',
        ]);

        $role = Role::create($validated);
        return response()->json($role, 201);
    });
// });

/**
 * City Routes
 */
// Route::middleware('auth:sanctum')->group(function () {
    Route::get('/cities', function () {
        return City::all();
    });

    Route::post('/cities', function (Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
        ]);

        $city = City::create($validated);
        return response()->json($city, 201);
    });
// });

/**
 * post Routes
 */


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/posts', [PostController::class, 'index']);
    Route::post('/posts', [PostController::class, 'store']);
    Route::put('/posts/{id}', [PostController::class, 'update']);
    Route::delete('/posts/{id}', [PostController::class, 'destroy']);
});

