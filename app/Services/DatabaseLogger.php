<?php

namespace App\Services;

use App\Models\LogEntry;
use Illuminate\Support\Facades\Auth;

class DatabaseLogger
{
    protected $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Registra uma mensagem no banco de dados.
     *
     * @param string $level   Nível do log (ex: info, warning, error)
     * @param string $message Mensagem a ser registrada
     * @param array  $context Contexto adicional (opcional)
     */
    public static function log(string $level, string $message, array $context = [])
    {
        $userId = Auth::check() ? Auth::id() : null;

        LogEntry::create([
            'level'      => $level,
            'message'    => $message,
            'context'    => json_encode($context),
            'user_id'    => $userId, // ID do usuário autenticado
            'created_at' => now(),
        ]);
    }
}
