<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = $request->user()->tasks()->get();

        return response()->json($tasks);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => ['required', Rule::in(['pending', 'in_progress', 'completed'])],
            'due_date' => 'nullable|date',
        ]);

        $task = $request->user()->tasks()->create($validated);

        return response()->json($task, 201);
    }
    public function show(Request $request, Task $task)
    {
        return response()->json($task);
    }
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'status' => [Rule::in(['pending', 'in_progress', 'completed'])],
            'due_date' => 'nullable|date',
        ]);

        $task->update($validated);

        return response()->json($task);
    }
    public function destroy(Request $request, Task $task)
    {
        $task->delete();

        return response()->json(['message' => 'Task deleted']);
    }
}
