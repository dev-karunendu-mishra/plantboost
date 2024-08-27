<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use App\Http\Controllers\Controller;
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

    public $columns = ["id" => "ID", "name" => "Name", "description" => "Description", "profile" => "Profile", "created_at" => "Created At"];

    public $fields = [
        "name" => [
            "id" => "tname",
            "name" => "name",
            "type" => "text",
            "label" => "User's Name",
            "placeholder" => "User's Name"
        ],
        "description" => [
            "id" => "tdescription",
            "name" => "description",
            "type" => "textarea",
            "label" => "Description",
            "placeholder" => "Description"
        ],
        "profile" => [
            "id" => "image",
            "name" => "profile",
            "type" => "file",
            "label" => "Profile",
            "placeholder" => "Profile"
        ],
        "image" => [
            "id" => "image",
            "name" => "image[]",
            "type" => "file",
            "label" => "Testimonial Media",
            "placeholder" => "Testimonial Media"
        ]
    ];



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        return view($this->indexView, ['columns' => $this->columns, 'fields' => $this->fields, 'edit' => false, 'testimonials' => $testimonials, 'model' => null]);
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
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif|max:20480',
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:20480',
        ]);

        // Handle file upload
        $profile = null;
        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $profile = $file->storeAs('uploads/testimonials/profile', $fileName, 'uploads'); // 'uploads' is the storage folder
        }

        $testimonial = Testimonial::create(["name" => $request->name, "description" => $request->description, "profile" => $profile]);
        if ($request->hasFile('image')) {
            // Handle file uploads
            foreach ($request->file('image') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('uploads/testimonials', $fileName, 'uploads'); // 'uploads' is the storage folder
                // Save file path to the database
                $testimonial->images()->create([
                    'path' => $filePath,
                ]);
            }
        }
        return redirect()->route($this->storeRoute)->with('success', $this->updateMessage);
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
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
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480',
            'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480',
        ]);

        // Handle file upload
        $profile = null;
        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $profile = $file->storeAs('uploads/testimonials/profile', $fileName, 'uploads'); // 'uploads' is the storage folder
        }
        $testimonial->update(["name" => $request->name, "description" => $request->description, "profile" => $profile ? $profile : $testimonial->profile]);

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('uploads/testimonials', $fileName, 'uploads'); // 'uploads' is the storage folder
                // Save file path to the database
                $testimonial->images()->create([
                    'path' => $filePath,
                ]);
            }
        }
        return redirect()->route($this->storeRoute)->with('success', $this->updateMessage);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        // Delete associated images
        foreach ($testimonial->images as $image) {
            // Assuming images are stored in public disk
            if (Storage::disk('public')->exists($image->path)) {
                Storage::disk('public')->delete($image->path);
            }
            // Optionally, delete the image record from the database
            $image->delete();
        }
        $testimonial->delete();
        $testimonial->delete();
        return redirect()->route($this->deleteRoute)->with('success', $this->deleteMessage);
    }
}
