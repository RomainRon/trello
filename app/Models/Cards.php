<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cards extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'list_id'];

    public function lists()
    {
        return $this->belongsTo(BoardLists::class);
    }


}