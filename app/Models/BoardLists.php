<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardLists extends Model
{
    use HasFactory;
    protected $table = 'boardlists';
    protected $fillable = ['title', 'board_id', 'position'];


    public function boards()
    {
        return $this->belongsTo(Board::class);
    }

    public function cards()
    {
        return $this->hasMany(Cards::class , 'boardlist_id');
    }

}