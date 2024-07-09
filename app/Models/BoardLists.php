<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardLists extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'board_id'];

    public function boards()
    {
        return $this->belongsTo(Boards::class);
    }

    public function cards()
    {
        return $this->hasMany(Cards::class);
    }
}