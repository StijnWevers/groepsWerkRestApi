<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job; 

class PostController extends Controller
{
    public function index()
    {
        return Job::with('user')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'nullable|string|max:255',
            'fee' => 'nullable|numeric|min:0',
        ]);

        $job = Job::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'location' => $validated['location'] ?? null,
            'fee' => $validated['fee'] ?? null,
            'user_id' => auth()->id(),
        ]);

        return response()->json($job, 201);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'nullable|string|max:255',
            'fee' => 'nullable|numeric|min:0',
        ]);

        $job = Job::findOrFail($id);

        $job->update($validated);

        return response()->json($job);
    }

    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();

        return response()->json(['message' => 'Job deleted successfully']);
    }
}
