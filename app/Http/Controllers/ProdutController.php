<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProdutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // crie um codigo para que esta função 
        // busque todos os produtos no banco de dados
        // e retorne um json com os produtos encontrados
        // e status 200
        $products = Product::all();

        if ($products->isEmpty()) {
            return response()->json(['message' => 'Nenhum produto encontrado'], 404);
        }

        return response()->json($products, 200);
    }

    /**
     * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'first_name' => ['required', 'string', 'max:30'],
                'last_name' => ['nullable', 'string', 'max:30'],
                'description' => ['required', 'string', 'max:255'],
                'price' => ['required', 'numeric', 'min:0'],
                'stock' => ['required', 'numeric', 'min:0'],
            ]);

            $product = Product::create($validated);
            return response()->json($product, 201);
        } catch (ValidationException $e) {
            report($e);
            return response()->json(['message' => $e->errors()], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // crie um codigo para que esta função 
        // busque um produto de acordo com o id passado 
        // e retorne um json com o produto encontrado
        // e status 200
        $product = Product::find($id);

        if (!$product) {
            return response()->json($product, 200);
        } else {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update(Request $request, string $id)
    {
        // crie um codigo para que esta função 
        // busque um produto de acordo com o id passado 
        // e atualize os campos do produto com os dados
        // passados no corpo da requisição
        // e retorne um json com o produto atualizado e status 200
        $product = Product::find($id);

        if ($product) {
            $validatedData = $request->validate([
                'first_name' => ['required', 'string', 'max:30'],
                'last_name' => ['nullable', 'string', 'max:30'],
                'description' => ['required', 'string', 'max:255'],
                'price' => ['required', 'numeric', 'min:0'],
                'stock' => ['required', 'numeric', 'min:0'],
            ]);

            $product->update($validatedData);

            return response()->json($product, 200);
        } else {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // crie um codigo para que esta função 
        // busque um produto de acordo com o id passado 
        // e delete o produto
        // e retorne um json com o produto deletado e status 200
        $product = Product::find($id);

        if ($product) {
            $product->delete();
            return response()->json(['message' => 'Produto deletado com sucesso'], 204);
        } else {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }
    }
}
