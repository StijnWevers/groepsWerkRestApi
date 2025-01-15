<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

// accept a post request fromt /rest eindpoint and return a json response of the body in the header
Route::post('/test', function (Request $request) {
    return response()->json([
        'message' => 'You have sent a POST request',
        'body' => $request->all(),
    ]);
});

// Route to login user based on the request
Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');
    // checks if the credentials are valid (hash check with Auth facade)
    if (Auth::attempt($credentials)) {
        // return a random string as token
        return response()->json([
            'token' => Str::random(80),
            'email' => $request->email,
            'name' => Auth::user()->name,
            'created_at' => Auth::user()->created_at
            // YOU CAN ADD MORE DATA HERE LIKE USER EMAIL AND NAME
        ]);
    }
    // just return a 401 status code
    return response()->json([
        'message' => 'Unauthorized'
    ], 401);
});
// Route to create a new user based on the request
Route::post('/register', function (Request $request) {
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);
    return response()->json($user, 201);
});
// route to get all users - testing purposes - add middleware to protect this route
Route::get('/users', function () {
    $getUsers = DB::select('SELECT name,email,created_at FROM users');
    return response()->json($getUsers, 200);
})->middleware('auth:sanctum');

Route::get('/login', function () {
    return response()->json([
        'message' => 'You are not logged in'
    ], 401);
})->name('login');