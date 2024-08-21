<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    private $indexView = 'admin.settings.all';
    private $storeRoute = 'admin.settings';
    private $createView = 'admin.settings.create';
    private $editView = 'admin.settings.edit';
    private $deleteRoute = 'admin.settings';
    private $deleteMessage = 'Setting deleted successfully.';
    private $createMessage = 'Setting created successfully.';
    private $updateMessage = 'Setting updated successfully.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::first();
        return view($this->createView,['settings'=>$settings,'edit'=>false]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'notification'=>'required',
            'notification_2nd'=>'required',
            'estimate_order_ready'=>'required',
            'estimate_order_delivery'=>'required',
            'domain'=>'required',
            'address'=>'required',
            'mobile'=>'required',
            'email'=>'required',
            'logo'=>'required|mimes:png,jpg,jpeg,gif,svg',
            'facebook'=>'nullable',
            'twitter'=>'nullable',
            'instagram'=>'nullable',
            'linkedin'=>'nullable',
            'youtube'=>'nullable',
            'location'=>'nullable',
            'branches'=>'nullable',
            
        ]);
            // Handle file upload
        $logo=null;
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $logo = $file->storeAs('uploads/logo', $fileName); // 'uploads' is the storage folder
        }
        
        $icon=null;
        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $icon = $file->storeAs('uploads/logo', $fileName); // 'uploads' is the storage folder
        }

        $request->merge([
            'logo' => $logo,
            'icon' => $icon,
        ]);

        Setting::create($request->all());
        return redirect()->route($this->storeRoute)->with('success', $this->createMessage);
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        $logo=null;
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $logo = $file->storeAs('uploads/logo', $fileName); // 'uploads' is the storage folder
        }
        
        $icon=null;
        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $icon = $file->storeAs('uploads/logo', $fileName); // 'uploads' is the storage folder
        }

    
        $request->merge([
            'logo' => !empty($logo) ? $logo : $setting->logo,
            'icon' => !empty($icon) ? $icon : $setting->icon,
        ]);


        $setting->update($request->all());
        return redirect()->route($this->storeRoute)->with('success', $this->updateMessage);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        $setting->delete();
        return redirect()->route($this->deleteRoute)->with('success', $this->deleteMessage);
    }
}
