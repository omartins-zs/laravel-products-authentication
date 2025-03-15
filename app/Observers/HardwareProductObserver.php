<?php

namespace App\Observers;

use App\Models\HardwareProduct;
use Illuminate\Support\Facades\Log;

class HardwareProductObserver
{
    /**
     * Acionado quando um produto é criado
     */
    public function created(HardwareProduct $hardwareProduct)
    {
        Log::info("Produto criado: {$hardwareProduct->name}, Preço: R$ {$hardwareProduct->price}, Estoque: {$hardwareProduct->stock}");
    }

    /**
     * Acionado quando um produto é atualizado
     */
    public function updated(HardwareProduct $hardwareProduct)
    {
        Log::info("Produto atualizado: {$hardwareProduct->name}, Novo Preço: R$ {$hardwareProduct->price}, Estoque Atual: {$hardwareProduct->stock}");
    }

    /**
     * Acionado quando um produto é excluído
     */
    public function deleted(HardwareProduct $hardwareProduct)
    {
        Log::warning("Produto excluído: {$hardwareProduct->name}");
    }
}
