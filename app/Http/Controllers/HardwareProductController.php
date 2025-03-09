<?php

namespace App\Http\Controllers;

use App\Http\Requests\HardwareProductRequest;
use App\Models\HardwareProduct;
use App\Services\DatabaseLogger;
use Illuminate\Support\Facades\Log;

class HardwareProductController extends Controller
{
    // Lista todos os produtos
    public function index()
    {
        $products = HardwareProduct::all();
        return view('hardware_products.index', compact('products'));
    }

    // Exibe o formulário para criar um novo produto
    public function create()
    {
        return view('hardware_products.create');
    }

    // Salva um novo produto
    public function store(HardwareProductRequest $request)
    {
        $product = HardwareProduct::create($request->validated());
        DatabaseLogger::log('info', 'Produto de hardware cadastrado', [
            'product_id' => $product->id
        ]);
        return redirect()->route('hardware_products.index')
            ->with('success', 'Produto cadastrado com sucesso!');
    }

    // Exibe os detalhes de um produto
    public function show($id)
    {
        $product = HardwareProduct::findOrFail($id);
        return view('hardware_products.show', compact('product'));
    }

    // Exibe o formulário para editar um produto
    public function edit($id)
    {
        $product = HardwareProduct::findOrFail($id);
        return view('hardware_products.edit', compact('product'));
    }

    // Atualiza os dados de um produto
    public function update(HardwareProductRequest $request, $id)
    {
        $product = HardwareProduct::findOrFail($id);
        $product->update($request->validated());
        DatabaseLogger::log('info', 'Produto de hardware atualizado', [
            'product_id' => $product->id
        ]);
        return redirect()->route('hardware_products.index')
            ->with('success', 'Produto atualizado com sucesso!');
    }

    // Remove um produto
    public function destroy($id)
    {
        $product = HardwareProduct::findOrFail($id);
        $product->delete();
        DatabaseLogger::log('info', 'Produto de hardware removido', [
            'product_id' => $product->id
        ]);
        return redirect()->route('hardware_products.index')
            ->with('success', 'Produto removido com sucesso!');
    }
}
