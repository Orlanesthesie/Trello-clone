<?php

namespace App\Http\Controllers;

use App\Models\BoardLists;
use Illuminate\Http\Request;


class BoardListController extends Controller
{
    public function index()
    {
        $boardlists = BoardLists::all();
        return view('boardlist.index', compact('boardlists'));
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
