<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Facades\Log;

class ProductObserver
{
    /**
     * Acionado quando um produto é criado
     */
    public function created(Product $product)
    {
        Log::info("Produto criado: {$product->name}, Preço: R$ {$product->price}, Estoque: {$product->stock}");
        // dd('Observer funcionando!', $product);
    }

    /**
     * Acionado quando um produto é atualizado
     */
    public function updated(Product $product)
    {
        Log::info("Produto atualizado: {$product->name}, Novo Preço: R$ {$product->price}, Estoque Atual: {$product->stock}");
    }

    /**
     * Acionado quando um produto é excluído
     */
    public function deleted(Product $product)
    {
        Log::warning("Produto excluído: {$product->name}");
    }
}
