<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Job;
use App\Models\Location;
use App\Models\Role;
use App\Models\City;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

/**
 * Authentication Routes
 */
Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        return response()->json([
            'token' => Str::random(80),
            'email' => $request->email,
            'name' => Auth::user()->name,
            'created_at' => Auth::user()->created_at
        ]);
    }
    return response()->json(['message' => 'Unauthorized'], 401);
});

Route::post('/register', function (Request $request) {
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);
    return response()->json($user, 201);
});

/**
 * User Routes
 */
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users', function () {
        return User::select('name', 'email', 'created_at')->get();
    });
});

/**
 * Event Routes
 */
Route::get('/events', function () {
    return App\Models\Event::all();
});

Route::get('/events/{id}', function ($id) {
    return App\Models\Event::findOrFail($id);
});

Route::post('/events', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'date' => 'required|date',
    ]);

    $event = App\Models\Event::create($validated);
    return response()->json($event, 201);
});

Route::put('/events/{id}', function (Request $request, $id) {
    $event = App\Models\Event::findOrFail($id);

    $validated = $request->validate([
        'name' => 'sometimes|required|string|max:255',
        'description' => 'nullable|string',
        'date' => 'sometimes|required|date',
    ]);

    $event->update($validated);
    return response()->json($event, 200);
});

Route::delete('/events/{id}', function ($id) {
    $event = App\Models\Event::findOrFail($id);
    $event->delete();
    return response()->json(null, 204);
});

/**
 * Job Routes
 */
Route::get('/jobs', function () {
    return Job::all();
});

Route::get('/jobs/{id}', function ($id) {
    return Job::findOrFail($id);
});

Route::post('/jobs', function (Request $request) {
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'company_name' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'posted_date' => 'required|date',
    ]);

    $job = Job::create($validated);
    return response()->json($job, 201);
});

Route::put('/jobs/{id}', function (Request $request, $id) {
    $job = Job::findOrFail($id);

    $validated = $request->validate([
        'title' => 'sometimes|required|string|max:255',
        'description' => 'nullable|string',
        'company_name' => 'sometimes|required|string|max:255',
        'location' => 'sometimes|required|string|max:255',
        'posted_date' => 'sometimes|required|date',
    ]);

    $job->update($validated);
    return response()->json($job, 200);
});

Route::delete('/jobs/{id}', function ($id) {
    $job = Job::findOrFail($id);
    $job->delete();
    return response()->json(null, 204);
});

/**
 * Location Routes
 */
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

/**
 * Role Routes
 */
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

/**
 * City Routes
 */
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
