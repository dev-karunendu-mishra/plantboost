<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

abstract class Controller
{
    /**
     * Remove old files associated with the given model and relationship.
     *
     * @param  object  $model
     * @param  string  $relationship
     * @param  string  $disk
     * @return void
     */
    public function removeOldFiles($model, $relationship, $disk = 'public')
    {
        // Get all existing files from the specified relationship
        $existingFiles = $model->{$relationship};

        foreach ($existingFiles as $file) {
            if (Storage::disk($disk)->exists($file->path)) {
                // Delete the file from storage
                Storage::disk($disk)->delete($file->path);
                // Delete the file record from the database
                $file->delete();
            }
        }
    }

    public function uploadFile(Request $request, $fileKey, $destination)
    {
        if ($request->hasFile($fileKey)) {
            $file = $request->file($fileKey);
            $fileName = time() . '_' . $file->getClientOriginalName();
            return $file->storeAs($destination, $fileName, 'uploads');
        }
        return null;
    }

    public function uploadMultipleFiles(Request $request, $fileInputName, $folder)
    {
        $fileData = [];
        if ($request->hasFile($fileInputName)) {
            foreach ($request->file($fileInputName) as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs($folder, $fileName, 'uploads'); // 'uploads' is the storage disk
                $fileData[] = ['path' => $filePath];
            }
        }
        return $fileData;
    }
}
