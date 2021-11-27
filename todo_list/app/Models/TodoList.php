<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start_time',
        'begin_time',
        'end_time',
        'is_complete',
        'level'
    ];
}
