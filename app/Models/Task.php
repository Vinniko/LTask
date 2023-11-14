<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    const STATUSES = [ // Реализация для тестового проекта. Правильно вынести статусы в отдельную таблицу
        'new',
        'in_work',
        'closed',
    ];

    protected $fillable = [
        'name',
        'description',
        'author_id',
        'status',
        'is_open',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
