<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cards extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'board_list_id'];

    public function lists()
    {
        return $this->belongsTo(BoardLists::class, 'board_list_id');
    }
}
