<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    protected $fillable = [
        'receita_id',
        'sharedBy_id',
        'receita_ownerId'

    ];
}
