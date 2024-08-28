<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    private $indexView = 'admin.products.all';
    private $storeRoute = 'admin.products';
    private $editView = 'admin.products.edit';
    private $deleteRoute = 'admin.products';
    private $deleteMessage = 'Product deleted successfully.';
    private $createMessage = 'Product created successfully.';
    private $updateMessage = 'Product updated successfully.';

    private $columns = ["id"=>"ID", "name"=>"Name", "images"=>"Image", "price"=>"Price", "created_at"=>"Created At"];

    private $fields = [
        "name"=>[
            "id"=>"name",
            "name"=>"name",
            "type"=>"text",
            "label"=>"Product's Name",
            "placeholder"=>"Product's Name"
        ],
        "description"=>[
            "id"=>"description",
            "name"=>"description",
            "type"=>"textarea",
            "label"=>"Product's Description",
            "placeholder"=>"Product's Description"
        ],
        "price"=>[
            "id"=>"price",
            "name"=>"price",
            "type"=>"text",
            "label"=>"Product's Price",
            "placeholder"=>"Product's Price"
        ],
        "old_price"=>[
            "id"=>"old_price",
            "name"=>"old_price",
            "type"=>"text",
            "label"=>"Product's Old Price",
            "placeholder"=>"Product's Old Price"
        ],
        "offer"=>[
            "id"=>"offer",
            "name"=>"offer",
            "type"=>"text",
            "label"=>"Product's offer",
            "placeholder"=>"Product's offer"
        ],
        "reviews"=>[
            "id"=>"reviews",
            "name"=>"reviews",
            "type"=>"text",
            "label"=>"Product's Reviews",
            "placeholder"=>"Product's Reviews"
        ],
        "rating"=>[
            "id"=>"rating",
            "name"=>"rating",
            "type"=>"text",
            "label"=>"Product's Rating",
            "placeholder"=>"Product's Rating"
        ],
        "image"=>[
            "id"=>"productImage",
            "name"=>"image[]",
            "type"=>"file",
            "label"=>"Product Image",
            "placeholder"=>"Product Image"
        ]
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Product::with(['images'])->first();
        $edit = !empty($records);
        return view($this->indexView,['columns'=>$this->columns,'fields'=>$this->fields,'edit'=>$edit,'records'=>$records,'model'=>$records]);
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
            'description' => 'required|string',
            'price' => 'required|numeric',
            'old_price' => 'required|numeric',
            'offer' => 'required|numeric',
            'reviews' => 'required|numeric',
            'rating' => 'required|numeric',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'seo_title' => 'nullable|string',
            'seo_keywords' => 'nullable|string',
            'seo_description' => 'nullable|string',
        ]);

        $product = Product::create($validatedData);
        // Handle file uploads if provided
        if ($request->hasFile('image')) {
            // Upload multiple files and get the file data
            $fileData = $this->uploadMultipleFiles($request, 'image', 'uploads/products');
            // Save each file path to the database in one go
            $product->images()->createMany($fileData);
        }
        return redirect()->route($this->storeRoute)->with('success', $this->createMessage);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view($this->editView,['columns'=>$this->columns,'fields'=>$this->fields, 'model'=>$product, 'edit'=>true]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // Validate only the fields that are present in the request
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'old_price' => 'nullable|numeric',
            'offer' => 'nullable|numeric',
            'reviews' => 'nullable|numeric',
            'rating' => 'nullable|numeric',
            'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'seo_title' => 'nullable|string',
            'seo_keywords' => 'nullable|string',
            'seo_description' => 'nullable|string',
        ]);

    
        // Update product fields
        $product->update($validatedData);

        // Handle file uploads if provided
        if ($request->hasFile('image')) {
            // Upload multiple files and get the file data
            $fileData = $this->uploadMultipleFiles($request, 'image', 'uploads/products');
            // Save each file path to the database in one go
            $product->images()->createMany($fileData);
            // Remove old files associated with the product
            $this->removeOldFiles($product, 'images', 'uploads');
        }

        return redirect()->route($this->storeRoute)->with('success', $this->updateMessage);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->removeOldFiles($product, 'images', 'uploads');
        $product->delete();
        return redirect()->route($this->deleteRoute)->with('success', $this->deleteMessage);
    }

    public function deleteImage($imageId)
    {
        // Find the image by ID
        $image = Image::findOrFail($imageId);
        
        // Delete the image file from storage
        if (Storage::disk('uploads')->exists($image->path)) {
            Storage::disk('uploads')->delete($image->path);
        }
        
        // Delete the image record from the database
        $image->delete();
        return redirect()->back()->with('success', 'Image deleted successfully.');
    }
}
