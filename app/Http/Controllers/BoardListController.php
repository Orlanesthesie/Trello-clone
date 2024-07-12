<?php

namespace App\Http\Controllers;

use App\Models\BoardLists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoardListController extends Controller
{
    public function index(Request $request)
    {
        $board_id = $request->query('board_id');
        $boardlists = BoardLists::all();

        return view('boardlists.index', compact('boardlists'));
    }

    public function create(Request $request)
    {
        $board_id = $request->query('board_id');

        return view('boardlists.create', ['board_id' => $board_id]);
    }


    public function store(Request $request)
    {
        $userid = $request->user()->id;
        $data = $request->all();

        $list = new BoardLists();
        $list->title = $data['title'];
        $list->board_id = $data['board_id'];
        $list->position = 0;
        $list->save();

        return redirect()->route('boards.show', ['board' => $list->board_id])->with('success', 'Board List created successfully.');
    }

    public function show($id)
    {
        $boardlist = BoardLists::findOrFail($id);
        return view('boardlists.show', compact('boardlist'));
    }

    public function edit($id)
    {
        $boardlist = BoardLists::findOrFail($id);
        return view('boardlists.edit', compact('boardlist'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        $boardlist = BoardLists::findOrFail($id);
        $boardlist->update($request->all());

        return redirect()->route('boardlists.index')->with('success', 'Board List updated successfully.');
    }

    public function destroy($id, Request $request)
    {
        
        $boardlist = BoardLists::findOrFail($id);
        $boardlist->delete();
        // $boardId = $request->route('board');
        // dd($boardId);

        // return redirect()->route('boards.show', ['board' => $boardId])->with('success', 'Board List deleted successfully.');
        return redirect()->route('boards.index',)->with('success', 'Board List deleted successfully.');

    }
}
