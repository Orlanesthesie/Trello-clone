<?php

namespace App\Http\Controllers;

use App\Models\BoardLists;
use App\Models\Cards;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index()
    {
        $cards = Cards::all();
        return view('cards.index', compact('cards'));
    }

    public function create($id, Request $request)
    {
        $boardlist_id = $id;
        $boardlist = BoardLists::findOrFail($id);

        return view('cards.create', compact('boardlist_id', 'boardlist'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'board_list_id' => 'required|exists:board_lists,id',
        ]);
        Cards::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'board_list_id' => $request->input('board_list_id'),
        ]);

        return redirect()->route('board.index')->with('success', 'Card created successfully.');
    }

    public function show($id)
    {
        $card = Cards::findOrFail($id);
        return view('cards.show', compact('card'));
    }

    public function edit($id)
    {
        $card = Cards::findOrFail($id);
        return view('cards.edit', compact('card'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'board_list_id' => 'required|exists:board_lists,id'
        ]);

        $card = Cards::findOrFail($id);
        $card->title = $request->input('title');
        $card->description = $request->input('description');
        $card->board_list_id = $request->input('board_list_id');
        $card->save();

        return redirect()->route('cards.index')->with('success', 'Card updated successfully.');
    }

    public function destroy($id)
    {
        $card = Cards::findOrFail($id);
        $card->delete();

        return redirect()->back()->with('success', 'Card deleted successfully.');

    }
}
