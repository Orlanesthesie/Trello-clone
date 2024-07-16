<?php

namespace App\Http\Controllers;

use App\Models\BoardLists;
use App\Models\Boards;
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
        // dd($request);
        $request->validate([
            'title' => 'required|max:255',
        ]);

        $boardlist = BoardLists::findOrFail($id);
        $board = Boards::where('id', $boardlist->board_id)->get();
        $boardlist->update($request->all());

        return redirect()->route('boards.show', ['board' => $boardlist->board_id])->with('success', 'List updated successfully.');

    }

    public function destroy($id)
    {
        $boardlist = BoardLists::findOrFail($id);
        $board = Boards::where('id', $boardlist->board_id)->get();
        $boardlist->delete();

        return redirect()->back()->with('success', 'List deleted successfully.');
    }
}
