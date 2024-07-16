<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cards;

class CardController extends Controller
{
    public function create()
    {
        return view('board.show');
    }
    public function store(Request $request)
    {
        $list_id = auth()->id();

        $card = new Cards;
        $card->title = $request->title;
        $card->description = $request->description;
        $card->list_id = $list_id;
        $card->save();

        return redirect()->route('board.show')->with('success', 'Card created successfully.');
    }
    public function destroy($id)
    {
        $card = Cards::findOrFail($id);
        $card->delete();

        return redirect()->route('board.show')->with('success', 'Card deleted successfully.');
    }}
