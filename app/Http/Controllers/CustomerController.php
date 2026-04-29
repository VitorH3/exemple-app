<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // crie um codigo para que esta função busque todos os clientes
        // e retorne um json com os clientes encontrados e status 200
        $customers = Customer::all();
        if ($customers->isEmpty()) {
            return response()->json(['message' => 'Nenhum cliente encontrado'], 404);
        }
        return response()->json($customers, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers',
            'phone' => 'nullable|string|max:255',
        ]);

        $customer = Customer::create($validatedData);
        return response()->json($customer, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // crie um codigo para que esta função busque um cliente de acordo com o id passado
        // e retorne um json com o cliente encontrado e status 200
        $customer = Customer::find($id);
        if (!$customer) {
            return response()->json(['message' => 'Cliente não encontrado'], 404);
        }
        return response()->json($customer, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
