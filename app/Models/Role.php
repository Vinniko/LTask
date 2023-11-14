<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    const ROLE_STANDART = 'standart';
    const ROLE_EDITOR = 'editor';

    protected $fillable = [
        'name',
    ];
}
