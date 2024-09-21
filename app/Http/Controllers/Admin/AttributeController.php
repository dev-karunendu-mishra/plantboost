<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'product_id' => 'required|exists:products,id',
            'name' => 'required|max:255',
        ]);

        // Check if an order exists with the same mobile number in the last 30 days
        $existingAttribute = Attribute::where('name', $validatedData['name'])
            ->where('product_id', $validatedData['product_id'])
            ->exists();

        if ($existingAttribute) {
            return redirect()->back()->withErrors(['name' => 'This attribute already exists for this product.'])->withInput();
        }

        Attribute::create($validatedData);

        return back()->with('success', 'Attribute added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Attribute $attribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attribute $attribute)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attribute $attribute)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attribute $attribute)
    {
        $attribute->delete();

        return back()->with('success', 'Attribute deleted successfully.');
    }
}
