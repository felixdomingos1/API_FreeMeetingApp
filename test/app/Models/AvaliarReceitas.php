<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvaliarReceitas extends Model
{
    protected $fillable = [
        'score',
        'receita_id',
        'avaliador'
    ];
}
