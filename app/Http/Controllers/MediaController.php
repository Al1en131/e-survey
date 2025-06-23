<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaController extends Controller
{
    public function destroy(Media $media)
    {
        $media->delete();

        session()->flash('success', 'Gambar berhasil dihapus!');

        return redirect()->back();
    }
}
