<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index()
    {
        
        $boards = Board::all();
        return view('board.index', compact('boards'));
    }

    public function create()
    {
        return view('board.create');
    }

    public function store(Request $request)
    {
        $userId = auth()->id();

        $board = new Board;
        $board->title = $request->title;
        $board->description = $request->description;
        $board->user_id = $userId;
        $board->save();

        return redirect()->route('board.index')->with('success', 'Board created successfully.');
    }

    public function show($id)
    {
        $board = Board::findOrFail($id);
        return view('board.show', compact('board'));
    }

    public function edit($id)
    {
        $board = Board::findOrFail($id);
        return view('board.edit', compact('board'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $board = Board::findOrFail($id);
        $board->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('board.index')->with('success', 'Board updated successfully.');
    }

    public function destroy($id)
    {
        $board = Board::findOrFail($id);
        $board->delete();

        return redirect()->route('board.index')->with('success', 'Board deleted successfully.');
    }
}