<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Resources\TodoListResource;
use App\Models\TodoList;
use Illuminate\Support\Facades\Auth;

class TodoListController extends Controller
{
    public function getNotCompletedTasks()
    {
        if (!Auth::user()->is_admin)
            return response()->json(['message' => 'Forbidden'], 403);
        return TodoListResource::collection(TodoList::select('id', 'name', 'start_time', 'end_time', 'is_complete', 'level')
            ->latest('level')
            ->where('is_complete', false)
            ->latest('id')
            ->limit(3)
            ->get());
    }

    public function addTodo(StoreTaskRequest $request)
    {
        if (!Auth::user()->is_admin)
            return response()->json(['message' => 'Forbidden'], 403);
        TodoList::create([
            'name' => $request->name,
            'start_time' => $request->start_time . ' ' . $request->time . ':00',
            'end_time' => $request->end_time . ' ' . $request->time1 . ':00',
            'level' => $request->level
        ]);
        return redirect('/todos');
    }

    public function todos()
    {
        if (!Auth::user()->is_admin)
            return response()->json(['message' => 'Forbidden'], 403);

        $todos = TodoListResource::collection(TodoList::select('id', 'name', 'start_time', 'end_time', 'is_complete', 'level')
            ->latest('id')
            ->paginate(15));
        return view('todo.todos', compact('todos'));
    }

    public function editTodo($todoId)
    {
        if (!Auth::user()->is_admin)
            return response()->json(['message' => 'Forbidden'], 403);

        $todo = TodoList::findOrFail($todoId);
        return view('todo.update', compact('todo'));
    }

    public function updateTodo(StoreTaskRequest $request, $id)
    {
        if (!Auth::user()->is_admin)
            return response()->json(['message' => 'Forbidden'], 403);

        $todo = TodoList::findOrFail($id)
            ->update([
                'name' => $request->name,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'is_complete' => $request->is_complete,
                'level' => $request->level
            ]);
        return redirect('/todos');
    }
}
