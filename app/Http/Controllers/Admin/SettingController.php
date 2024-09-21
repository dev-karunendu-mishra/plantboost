<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
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

        return view($this->createView, ['settings' => $settings, 'edit' => false]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'notification' => 'required',
            'notification_2nd' => 'required',
            'estimate_order_ready' => 'required',
            'estimate_order_delivery' => 'required',
            'domain' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'logo' => 'required|mimes:png,jpg,jpeg,gif,svg',
            'theme_color' => 'nullable',
            'facebook' => 'nullable',
            'twitter' => 'nullable',
            'instagram' => 'nullable',
            'linkedin' => 'nullable',
            'youtube' => 'nullable',
            'location' => 'nullable',
            'branches' => 'nullable',
        ]);

        // Handle file upload
        $logo = $this->uploadFile($request, 'logo', 'uploads/logo');
        $icon = $this->uploadFile($request, 'icon', 'uploads/logo');

        $validatedData['logo'] = $logo;
        $validatedData['icon'] = $logo;

        Setting::create($validatedData);

        return redirect()->route($this->storeRoute)->with('success', $this->createMessage);
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
        // Validate only the fields that are present in the request
        $validatedData = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'notification' => 'nullable|string',
            'notification_2nd' => 'nullable|string',
            'estimate_order_ready' => 'nullable|string',
            'estimate_order_delivery' => 'nullable|string',
            'theme_color' => 'nullable|string',
            'domain' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'mobile' => 'nullable|string|regex:/^[6-9]\d{9}$/',
            'email' => 'nullable|email|max:255',
            'logo' => 'nullable|mimes:png,jpg,jpeg,gif,svg',
            'facebook' => 'nullable|string',
            'twitter' => 'nullable|string',
            'instagram' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'youtube' => 'nullable|string',
            'location' => 'nullable|string',
            'branches' => 'nullable|string',
        ]);

        // Handle file upload and update only if a new file is provided
        if ($request->hasFile('logo')) {
            $validatedData['logo'] = $this->uploadFile($request, 'logo', 'uploads/logo');
        }

        if ($request->hasFile('icon')) {
            $validatedData['icon'] = $this->uploadFile($request, 'icon', 'uploads/logo');
        }

        // Update the record with only the provided data
        $setting->update(array_filter($validatedData));

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
