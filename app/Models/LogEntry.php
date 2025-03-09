<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogEntry extends Model
{
    protected $table = 'logs';

    // Se desejar que o updated_at não seja gerenciado automaticamente, defina:
    public $timestamps = false;

    protected $fillable = [
        'level',
        'message',
        'context',
        'user_id',
        'created_at',
    ];
}
