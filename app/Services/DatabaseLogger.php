<?php

namespace App\Services;

use App\Models\LogEntry;

class DatabaseLogger
{
    /**
     * Registra uma mensagem no banco de dados.
     *
     * @param string $level   Nível do log (ex: info, warning, error)
     * @param string $message Mensagem a ser registrada
     * @param array  $context Contexto adicional (opcional)
     */
    public static function log(string $level, string $message, array $context = [])
    {
        LogEntry::create([
            'level'      => $level,
            'message'    => $message,
            'context'    => json_encode($context),
            'created_at' => now(),
        ]);
    }
}
