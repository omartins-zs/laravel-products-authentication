<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Services\DatabaseLogger;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    // Lista todos os produtos
    public function index()
    {
        Log::info('Este é um log de teste', ['contexto' => 'valor']);

        $products = Product::all();
        return view('hardware_products.index', compact('products'));
    }

    // Exibe o formulário para criar um novo produto
    public function create()
    {
        return view('hardware_products.create');
    }

    // Salva um novo produto
    public function store(ProductRequest $request)
    {
        $product = Product::create($request->validated());
        DatabaseLogger::log('info', 'Produto de hardware cadastrado', [
            'product_id' => $product->id
        ]);
        return redirect()->route('hardware_products.index')
            ->with('success', 'Produto cadastrado com sucesso!');
    }

    // Exibe os detalhes de um produto
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('hardware_products.show', compact('product'));
    }

    // Exibe o formulário para editar um produto
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('hardware_products.edit', compact('product'));
    }

    // Atualiza os dados de um produto
    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->validated());
        DatabaseLogger::log('info', 'Produto de hardware atualizado', [
            'product_id' => $product->id
        ]);
        return redirect()->route('hardware_products.index')
            ->with('success', 'Produto atualizado com sucesso!');
    }

    // Remove um produto
    public function destroy($id, DatabaseLogger $logger)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        $logger->log('info', 'Produto de hardware removido', ['product_id' => $product->id]);

        return redirect()->route('hardware_products.index')
            ->with('success', 'Produto removido com sucesso!');
    }
}
