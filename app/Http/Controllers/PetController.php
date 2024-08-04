<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class PetController extends Controller
{
    private $apiUrl = 'https://petstore.swagger.io/v2';

    public function index()
    {
        $response = Http::get("$this->apiUrl/pet/findByStatus", ['status' => 'available']);
        $pets = $response->json();

        return view('pets.index', compact('pets'));
    }

    public function create()
    {
        return view('pets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'status' => 'required|string',
        ]);

        // Pobierz i zaktualizuj licznik ID
        $lastId = DB::table('pet_ids')->first()->last_id;
        $newId = $lastId + 1;

        // Zapisz nowe ID do bazy
        DB::table('pet_ids')->update(['last_id' => $newId]);

        $response = Http::post("$this->apiUrl/pet", [
            'id' => $newId,
            'name' => $request->name,
            'status' => $request->status,
        ]);

        if ($response->successful()) {
            return redirect()->route('pets.index')->with('success', 'Pet created successfully.');
        } else {
            return redirect()->back()->withErrors('Failed to create pet.');
        }
    }

    public function edit($id)
    {
        $response = Http::get("$this->apiUrl/pet/$id");
        $pet = $response->json();

        if (!$response->successful()) {
            return redirect()->route('pets.index')->withErrors('Pet not found.');
        }

        return view('pets.edit', compact('pet'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'status' => 'required|string',
        ]);

        $response = Http::put("$this->apiUrl/pet", [
            'id' => (int)$id,
            'name' => $request->name,
            'status' => $request->status,
        ]);

        if ($response->successful()) {
            return redirect()->route('pets.index')->with('success', 'Pet updated successfully.');
        } else {
            return redirect()->back()->withErrors('Failed to update pet.');
        }
    }

    public function destroy($id)
    {
        $response = Http::delete("$this->apiUrl/pet/$id");

        if ($response->successful()) {
            return redirect()->route('pets.index')->with('success', 'Pet deleted successfully.');
        } else {
            return redirect()->back()->withErrors('Failed to delete pet.');
        }
    }
}
