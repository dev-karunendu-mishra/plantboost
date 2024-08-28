<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    private $indexView = 'admin.sliders.all';
    private $storeRoute = 'admin.sliders';
    private $editView = 'admin.sliders.edit';
    private $deleteRoute = 'admin.sliders';
    private $deleteMessage = 'Slider deleted successfully.';
    private $createMessage = 'Slider created successfully.';
    private $updateMessage = 'Slider updated successfully.';

    public $columns = ["id"=>"ID", "title"=>"Title", "file_path"=>"Slider", "created_at"=>"Created At"];

    public $fields = [
        "title"=>[
            "id"=>"title",
            "name"=>"title",
            "type"=>"text",
            "label"=>"Slider's Title",
            "placeholder"=>"Slider's Title"
        ],
        
        "slider_file"=>[
            "id"=>"slider_file",
            "name"=>"slider_file",
            "type"=>"file",
            "label"=>"Slider File",
            "placeholder"=>"Slider File"
        ]
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Slider::all();
        return view($this->indexView,['columns'=>$this->columns,'fields'=>$this->fields,'edit'=>false,'records'=>$records,'model'=>null]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'nullable|string|max:255',
            'slider_file' => 'required|file|mimes:jpeg,jpg,png,gif,webp,mp4,mov,avi|max:10240', // 10MB max size
        ]);


        // Handle the file upload
        if ($request->hasFile('slider_file')) {
            $file = $request->file('slider_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            
            // Determine the file type
            $fileType = $file->getMimeType();
            $type = strpos($fileType, 'image') !== false ? 'image' : 'video';

            // Store the file in the public directory
            $filePath = $file->storeAs('uploads/sliders', $fileName, 'uploads');

            // Create a slider record
            Slider::create([
                'title' => $request->input('title'),
                'file_path' => $filePath,
                'file_type' => $type,
            ]);
        }
        return redirect()->route($this->storeRoute)->with('success', $this->createMessage);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view($this->editView,['columns'=>$this->columns,'fields'=>$this->fields, 'model'=>$slider, 'edit'=>true]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        // Validate the request
        $request->validate([
            'title' => 'nullable|string|max:255',
            'slider_file' => 'required|file|mimes:jpeg,jpg,png,gif,webp,mp4,mov,avi|max:10240', // 10MB max size
        ]);

         // Handle the file upload
        if ($request->hasFile('slider_file')) {
            $file = $request->file('slider_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            
            // Determine the file type
            $fileType = $file->getMimeType();
            $type = strpos($fileType, 'image') !== false ? 'image' : 'video';

            // Store the file in the public directory
            $filePath = $file->storeAs('uploads/sliders', $fileName, 'uploads');

            // Create a slider record
            $slider->update([
                'title' => $request->input('title'),
                'file_path' => $filePath,
                'file_type' => $type,
            ]);
        }
        return redirect()->route($this->storeRoute)->with('success', $this->updateMessage);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->route($this->deleteRoute)->with('success', $this->deleteMessage);
    }
}
