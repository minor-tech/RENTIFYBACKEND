<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $query = Property::query();

        // Full-text search for faster results
        if ($request->has('search')) {
            $query->whereRaw("MATCH(location, title) AGAINST(? IN BOOLEAN MODE)", [$request->search]);
        }

        // Filters
        if ($request->has('beds')) {
            $query->where('beds', $request->beds);
        }
        if ($request->has('sort')) {
            $query->orderBy('price', $request->sort);
        }

        $properties = $query->get();
        return response()->json($properties);
    }

    public function searchSuggestions(Request $request)
    {
        if (!$request->has('search')) {
            return response()->json([]);
        }

        $locations = Property::where('location', 'like', '%' . $request->search . '%')
                            ->distinct()
                            ->limit(5)
                            ->pluck('location');

        return response()->json($locations);
    }

    public function show($id)
    {
    $property = Property::findOrFail($id);
    return response()->json($property);
    }

    public function store(Request $request)
{
    $request->validate([
        'image' => 'required|string',
        'title' => 'required|string',
        'price' => 'required|string',
        'location' => 'required|string',
        'beds' => 'required|integer',
        'deposit' => 'required|integer',
        'area' => 'required|string',
        'baths'=>'required|integer',
    ]);

    $property = Property::create($request->all());

    return response()->json($property, 201);
}

public function destroy($id)
{
    Property::findOrFail($id)->delete();
    return response()->json(['message' => 'Property deleted']);
}



}
