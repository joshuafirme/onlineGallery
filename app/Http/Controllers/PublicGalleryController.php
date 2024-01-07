<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\PublicMediaGallery;
use Maestroerror;

class PublicGalleryController extends Controller
{
    public function demoPublicGallery()
    {
        $media = PublicMediaGallery::orderby('id', 'desc')->get();

        $photosOnly = PublicMediaGallery::where('file_path', 'like', '%.jpg')
            ->orWhere('file_path', 'like', '%.jpeg')
            ->orWhere('file_path', 'like', '%.png')
            ->orderby('id', 'desc')
            ->get();

        return view('/users/public/demo_public_gallery', [
            'media' => $media,
            'photosOnly' => $photosOnly,
        ]);
    }

    public function deletepublicmedia($id)
    {
        // Perform deletion logic, for example:
        $media = PublicMediaGallery::find($id);

        $media->delete();

        return redirect()
            ->back()
            ->with('success', 'media ' . $id . ' deleted successfully.');
    }

    public function processUploadImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'media_path.*' => 'max:51200', // Limit each file to 51200 kilobytes (50 MB)
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', 'File is too large! Please upload below 50 MB.');
        }

        $account = new PublicMediaGallery();

        if ($request->hasFile('media_path')) {
            $files = $request->file('media_path');

            foreach ($files as $file) {
                if ($file instanceof \Illuminate\Http\UploadedFile) {
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '_' . rand(100, 999) . '.' . $extension;
                    $file->move(public_path('uploadedFiles/PublicMedia/'), $filename);
                    $account->file_path = $filename;
                }
            }
        }
        $account->save();

        try {
            // Assuming the file upload is successful
            return response()->json(['success' => true, 'message' => 'File uploaded successfully']);
        } catch (\Exception $e) {
            \Log::error('Exception: ' . $e->getMessage());

            // If an exception occurs, return a JSON response with an error message and status code
            return response()->json(['success' => false, 'message' => 'File upload failed'], 500);
        }
    }

    public function processUploadImageSingle(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'media_path.*' => 'max:51200', // Limit each file to 51200 kilobytes (50 MB)
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', 'File is too large! Please upload below 50 MB.');
        }

        $account = new PublicMediaGallery();

        if ($request->File('media_path')) {
            $file = $request->file('media_path');

            $extension = $file->getClientOriginalExtension();
            
            $file_path = 'uploadedFiles/PublicMedia/';

            if ($extension == 'heic' || $extension == 'HEIC') {
                $filename = time() . '_' . rand(100, 999) . '.' . 'jpg';
                Maestroerror\HeicToJpg::convert($file)->saveAs($file_path . $filename);
            }
            else {
                $filename = time() . '_' . rand(100, 999) . '.' . $extension;
                $file->move(public_path($file_path), $filename);
            }

            $account->file_path = $filename;
        }

        $account->save();

        return redirect()
            ->route('demoPublicGallery', [])
            ->with('success', 'Data updated successfully');
    }
}
