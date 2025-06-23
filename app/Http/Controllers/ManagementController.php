<?php

namespace App\Http\Controllers;

use App\Models\Management;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ManagementController extends Controller
{
    /**
     * Display the management settings page.
     */
    public function index()
    {
        $management = Management::first();
        return view('pages.admin.setting', compact('management'));
    }

    public function welcome(Management $management)
    {
        $management = Management::all();
        return view('welcome', ['management' => $management]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Management $management)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:5|max:40|string',
            'description' => 'required|min:10|max:100|string',
            'media' => 'nullable|file|mimes:jpeg,png,jpg|max:1024 ',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        DB::beginTransaction();
        try {
            $management->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);

            if ($request->hasFile('media')) {
                $fileName = Str::random(8) . '.' . $request->file('media')->extension();
            
                if ($management->media) {
                    $management->clearMediaCollection('management');
                }
            
                $management->addMedia($request->file('media'))
                    ->usingFileName($fileName)
                    ->toMediaCollection('management');
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            if (app()->environment('local')) {
                throw $th;
            }

            session()->flash('error', 'An error has occurred');
            return redirect()->route('pages.admin.setting');
        }
        session()->flash('success', 'Successfully changed the data');

        return redirect()->route('admin.management.index');
    }
}
