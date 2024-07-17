<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BoardLists;
use App\Models\Board;

class BoardListController extends Controller
{
    public function index()
    {
        $boardLists = BoardLists::all();
        return view('boardLists.index', compact('boardLists'));
    }

    public function create(Board $board)
    {
        return view('boardLists.create', compact('board'));
    }

    public function store(Request $request, Board $board)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);


        $boardList = new BoardLists([
            'title' => $request->title,
            'board_id' => $board->id,
            'position' => 1,
        ]);

        $boardList->save();

        return redirect()->route('board.show', $board->id)->with('success', 'Liste de tableau créée avec succès.');
    }

    public function destroy($id)
    {
        $boardList = BoardLists::findOrFail($id);
        $boardList->delete();

        return redirect()->route('board.show', $boardList->board_id)->with('success', 'Liste de tableau supprimée avec succès.');
    }
}
