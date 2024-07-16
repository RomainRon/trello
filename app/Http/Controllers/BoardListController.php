<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BoardLists;
use App\Models\Board;

class BoardListController extends Controller
{
    public function create(Board $board)
    {
        return view('boardLists.create', compact('board'));
    }
    
    public function store(Request $request, Board $board)
    {
        // Validation des données
        $request->validate([
            'title' => 'required|string|max:255',
            'board_id' => 'required|integer'
        ]);

        // Création d'une nouvelle liste de tableau
        $boardList = new BoardLists([
            'title' => $request->title,
            'board_id' => $board->id,
            'position' => 1, // Assurez-vous de définir une position par défaut ou une logique de position
        ]);
        $boardList->save();

        // Redirection avec message de succès
        return redirect()->back()->with('success', 'Liste de tableau créée avec succès.');
    }

    public function destroy($id)
    {
        $boardList = BoardLists::findOrFail($id);
        $boardList->delete();

        return redirect()->route('board.show', $boardList->board_id)->with('success', 'Liste de tableau supprimée avec succès.');
    }
}
