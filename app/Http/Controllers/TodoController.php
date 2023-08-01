<?php

namespace App\Http\Controllers;

use App\Http\Resources\TodoCollection;
use App\Models\Todo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(): TodoCollection
    {
        return new TodoCollection(
            Todo::query()->latest()->get()
        );
    }

    public function update(Request $request, Todo $todo): JsonResponse
    {
        $data = $request->validate([
            'description' => ['sometimes', 'required'],
            'completed' => ['sometimes', 'required']
        ]);

        $todo->update($data);
        return response()->json($todo);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate(['description' => 'required']);

        $todo = Todo::factory()->create($data);
        return response()->json($todo);
    }

    public function destroy(Todo $todo): TodoCollection
    {
        $todo->delete();

        return new TodoCollection(
            Todo::query()->latest()->get()
        );
    }
}
