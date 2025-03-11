<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogEntry extends Model
{
    protected $table = 'logs';

    public $timestamps = false;

    protected $fillable = [
        'level',
        'message',
        'context',
        'user_id',
        'created_at',
    ];

    // Adicione isso para garantir que created_at seja um objeto Carbon
    protected $dates = [
        'created_at',
    ];

    // Ou, se estiver usando Laravel 8.x ou superior, use $casts:
    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
