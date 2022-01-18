<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OsasunZentroak_crud extends Model
{
    use HasFactory;

    protected $fillable = [
        'userId', 'zentroarenKodea', 'mensaje'
    ];
}
