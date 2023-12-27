<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;
use App\Models\AccountsPayments;
use App\Models\Media;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    public function showGallery($id)
    {
        // Show gallery
        $accountsPayments = AccountsPayments::find($id);

        // $mediaAll = Media::all();
        // $uuids = $mediaAll
        //     ->pluck('accounts_payments_uuid')
        //     ->unique()
        //     ->toArray();

        // $mediaSlide = Media::whereIn('accounts_payments_uuid', $uuids)
        //     ->where('is_Check', 1)
        //     ->get();

        $media = $accountsPayments
            ->media()
            ->latest()
            ->get();

        $uuid = $accountsPayments->uuid;

        return view('/users/member/gallery', [
            'accountsPayments' => $accountsPayments,
            'media' => $media,
            // 'mediaSlide' => $mediaSlide,
            'uuid' => $uuid,
        ]);
    }

    public function showPhotos($id)
    {
        // Show photos
        $accountsPayments = AccountsPayments::find($id);

        $media = $accountsPayments
            ->media()
            ->latest()
            ->get();

        $uuid = $accountsPayments->uuid;

        return view('/users/member/photos', [
            'accountsPayments' => $accountsPayments,
            'media' => $media,
            'uuid' => $uuid,
        ]);
    }

    public function showVideos($id)
    {
        // Show videos
        $accountsPayments = AccountsPayments::find($id);

        $media = $accountsPayments
            ->media()
            ->latest()
            ->get();

        $uuid = $accountsPayments->uuid;

        return view('/users/member/videos', [
            'accountsPayments' => $accountsPayments,
            'media' => $media,
            'uuid' => $uuid,
        ]);
    }

    public function showmyQR($id)
    {
        // Show QR
        $accountsPayments = AccountsPayments::findOrFail($id);

        $payer_id = $accountsPayments->payer_id;
        $uuid = $accountsPayments->uuid;

        return view('/users/member/qr', [
            'accountsPayments' => $accountsPayments,
            'payer_id' => $payer_id,
            'uuid' => $uuid,
        ]);
    }

    public function showPublicGallery($id)
    {
        // Show Public Gallery
        $accountsPayments = AccountsPayments::find($id);

        if (!$accountsPayments) {
            // Handle the case where the account is not found
            return redirect()
                ->back()
                ->with('error', 'Account not found');
        }

        $media = $accountsPayments
            ->media()
            ->latest()
            ->get();

        $uuid = $accountsPayments->uuid;
        $payer_id = $accountsPayments->payer_id;

        return view('/users/public/public_gallery', [
            'accountsPayments' => $accountsPayments,
            'payer_id' => $payer_id,
            'media' => $media,
            'uuid' => $uuid,
        ]);
    }

    public function processUploadImage(Request $request, $id)
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

        $account = AccountsPayments::find($id);

        if ($request->hasFile('media_path')) {
            $files = $request->file('media_path');
            $mediaPaths = [];

            foreach ($files as $file) {
                if ($file instanceof \Illuminate\Http\UploadedFile) {
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '_' . rand(100, 999) . '.' . $extension;
                    $file->move(public_path('uploadedFiles/Media/' . $id), $filename);
                    $mediaPaths[] = $filename;
                }
            }

            // Associate media with the account
            foreach ($mediaPaths as $filePath) {
                $account->media()->create(['file_path' => $filePath]);
            }
        }

        $uuid = $account->uuid;

        try {
            // Assuming the file upload is successful
            return response()->json(['success' => true, 'message' => 'File uploaded successfully']);
        } catch (\Exception $e) {
            \Log::error('Exception: ' . $e->getMessage());

            // If an exception occurs, return a JSON response with an error message and status code
            return response()->json(['success' => false, 'message' => 'File upload failed'], 500);
        }

        // Redirect the user after a successful file upload
        return redirect()
            ->route('your-gallery', ['uuid' => $uuid])
            ->with('status', 'Data updated successfully');
    }

    public function processUploadImageSingle(Request $request, $id)
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

        $account = AccountsPayments::find($id);

        if ($request->hasFile('media_path')) {
            $files = $request->file('media_path');
            $mediaPaths = [];

            foreach ($files as $file) {
                if ($file instanceof \Illuminate\Http\UploadedFile) {
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '_' . rand(100, 999) . '.' . $extension;
                    $file->move(public_path('uploadedFiles/Media/' . $id), $filename);
                    $mediaPaths[] = $filename;
                }
            }

            // Associate media with the account
            foreach ($mediaPaths as $filePath) {
                $account->media()->create(['file_path' => $filePath]);
            }
        }

        $uuid = $account->uuid;

        return redirect()
            ->route('your-gallery', ['uuid' => $uuid])
            ->with('status', 'Data updated successfully');
    }

    public function updateMedia(Request $request)
    {
        $mediaIds = $request->input('media');

        // Now, you have an array of checked media IDs. You can update your database accordingly.

        // Example: Update the 'is_checked' column in the media table
        Media::whereIn('id', $mediaIds)->update(['is_Check' => true]);

        return redirect()
            ->back()
            ->with('success', 'Media added to the slideshow successfully.');
    }

    public function updateQR(Request $request, $id)
    {
        $account = AccountsPayments::find($id);

        $account->titleQR = $request->input('greetings');
        $account->nameQR = $request->input('name');
        $account->descriptionQR = $request->input('briefDescription');
        $account->shareQR = $request->input('shareDescription');
        $account->dateCreated = $request->input('date');

        $account->save();

        return redirect()
            ->back()
            ->with('success', 'Data updated successfully');
    }

    public function delete($id)
    {
        // Perform deletion logic, for example:
        $media = Media::find($id);

        $media->delete();

        return redirect()
            ->back()
            ->with('success', 'media ' . $id . ' deleted successfully.');
    }
}
