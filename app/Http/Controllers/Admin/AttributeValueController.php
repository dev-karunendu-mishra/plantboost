<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AttributeValue;
use Illuminate\Http\Request;

class AttributeValueController extends Controller
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
            'attribute_id' => 'required|exists:attributes,id',
            'value' => 'required|max:255',
        ]);

        // Check if an order exists with the same mobile number in the last 30 days
        $existingAttribute = AttributeValue::where('value', $validatedData['value'])
            ->where('attribute_id', $validatedData['attribute_id'])
            ->exists();

        if ($existingAttribute) {
            return redirect()->back()->withErrors(['value' => 'This attribute value already exists for this attribute.'])->withInput();
        }

        AttributeValue::create($validatedData);

        return back()->with('success', 'Attribute value added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AttributeValue $attributeValue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AttributeValue $attributeValue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AttributeValue $attributeValue)
    {
        $validatedData = $request->validate([
            'value' => 'required|max:255',
        ]);
        $attributeValue->update($validatedData);

        return back()->with('success', 'Attribute updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AttributeValue $attributeValue)
    {
        $attributeValue->delete();

        return back()->with('success', 'Attribute value deleted successfully.');
    }
}
