<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    private $indexView = 'admin.testimonial.all';

    private $storeRoute = 'admin.testimonials';

    private $editView = 'admin.testimonial.edit';

    private $deleteRoute = 'admin.testimonials';

    private $deleteMessage = 'Testimonial deleted successfully.';

    private $createMessage = 'Testimonial created successfully.';

    private $updateMessage = 'Testimonial updated successfully.';

    public $columns = ['id' => 'ID', 'name' => 'Name', 'description' => 'Description', 'images' => 'Media', 'created_at' => 'Created At'];

    public $fields = [
        'name' => [
            'id' => 'tname',
            'name' => 'name',
            'type' => 'text',
            'label' => "User's Name",
            'placeholder' => "User's Name",
        ],
        'product_id' => [
            'id' => 'product',
            'name' => 'product_id',
            'type' => 'select',
            'label' => "Product's ID",
            'placeholder' => "Product's ID",
        ],
        'description' => [
            'id' => 'tdescription',
            'name' => 'description',
            'type' => 'textarea',
            'label' => 'Description',
            'placeholder' => 'Description',
        ],
        // "profile" => [
        //     "id" => "image",
        //     "name" => "profile",
        //     "type" => "file",
        //     "label" => "Profile",
        //     "placeholder" => "Profile"
        // ],
        'image' => [
            'id' => 'image',
            'name' => 'image[]',
            'type' => 'file',
            'label' => 'Testimonial Media',
            'placeholder' => 'Testimonial Media',
        ],
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        $products = Product::all();
        $this->fields['product_id']['options'] = $products;

        return view($this->indexView, ['columns' => $this->columns, 'fields' => $this->fields, 'edit' => false, 'testimonials' => $testimonials, 'model' => null]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'name' => 'required|max:255',
            'description' => 'required',
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:20480',
        ]);

        $testimonial = Testimonial::create($validatedData);
        if ($request->hasFile('image')) {
            // Upload multiple files and get the file data
            $fileData = $this->uploadMultipleFiles($request, 'image', 'uploads/testimonials');
            // Save each file path to the database in one go
            $testimonial->images()->createMany($fileData);
        }

        return redirect()->route($this->storeRoute)->with('success', $this->updateMessage);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        $products = Product::all();
        $this->fields['product_id']['options'] = $products;

        return view($this->editView, ['columns' => $this->columns, 'fields' => $this->fields, 'model' => $testimonial, 'edit' => true]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480',
        ]);

        // Update product fields
        $testimonial->update($validatedData);

        // Handle file uploads if provided
        if ($request->hasFile('image')) {
            // Remove old files associated with the product
            $this->removeOldFiles($testimonial, 'images', 'uploads');
            // Upload multiple files and get the file data
            $fileData = $this->uploadMultipleFiles($request, 'image', 'uploads/testimonials');
            // Save each file path to the database in one go
            $testimonial->images()->createMany($fileData);

        }

        return redirect()->route($this->storeRoute)->with('success', $this->updateMessage);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        $this->removeOldFiles($testimonial, 'images', 'uploads');
        $testimonial->delete();

        return redirect()->route($this->deleteRoute)->with('success', $this->deleteMessage);
    }
}
