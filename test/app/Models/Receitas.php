<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receitas extends Model
{
    protected $fillable = [
        'title',
        'ingredient',
        'preparationTime',
        'preparationMethod',
        'receitaImg',
        'sharedBy',
        'user_id',
    ];
}
