<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlantController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $plants = Plant::where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('plants.index', compact('plants'));
    }

    public function create()
    {
        return view('plants.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'plant_name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'unit_price' => 'required|numeric|min:0|max:9999999999.99|decimal:0,2',
            'description' => 'nullable|string',
            'stock_status' => 'required|in:in stock,out of stock',
        ]);

        Plant::create(array_merge($validated, ['user_id' => Auth::id()]));

        return redirect()
            ->route('plants.index')
            ->with('success', 'Plant added successfully!');
    }

    public function show(Plant $plant)
    {
        $this->authorize('view', $plant);

        return view('plants.show', compact('plant'));
    }

    public function edit(Plant $plant)
    {
        $this->authorize('update', $plant);

        return view('plants.edit', compact('plant'));
    }

    public function update(Request $request, Plant $plant)
    {
        $this->authorize('update', $plant);

        $validated = $request->validate([
            'plant_name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'unit_price' => 'required|numeric|min:0|max:9999999999.99|decimal:0,2',
            'description' => 'nullable|string',
            'stock_status' => 'required|in:in stock,out of stock',
        ]);

        $plant->update($validated);

        return redirect()
            ->route('plants.index')
            ->with('success', 'Plant updated successfully!');
    }

    public function destroy(Plant $plant)
    {
        $this->authorize('delete', $plant);
        $plant->delete();

        return redirect()
            ->route('plants.index')
            ->with('success', 'Plant deleted successfully!');
    }
}
