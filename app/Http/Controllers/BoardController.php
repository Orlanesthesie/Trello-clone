<?php

namespace App\Http\Controllers;

use App\Models\Boards;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index()
    {
        $boards = Boards::all();
        return view('boards.index', compact('boards'));
    }

    public function create()
    {
        return view('boards.create');
    }

    public function store(Request $request)
    {
        $userId = auth()->id();

        $board = new Boards;
        $board->title = $request->title;
        $board->description = $request->description;
        $board->user_id = $userId;
        $board->save();

        return redirect()->route('boards.index')->with('success', 'Board created successfully.');
    }

    public function show($id)
    {
        $board = Boards::findOrFail($id);
        return view('boards.show', compact('board'));
    }

    public function edit($id)
    {
        $board = Boards::findOrFail($id);
        return view('boards.edit', compact('board'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $board = Boards::findOrFail($id);
        $board->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('boards.index')->with('success', 'Board updated successfully.');
    }

    public function destroy($id)
    {
        $board = Boards::findOrFail($id);
        $board->delete();

        return redirect()->route('boards.index')->with('success', 'Board deleted successfully.');
    }
}
