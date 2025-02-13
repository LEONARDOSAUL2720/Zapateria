<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $assets = Asset::all();
        return view('asset.create', compact('assets'));
    }


    public function store(Request $request)
    {
        //validación de campos requeridos
        $this->validate($request, [
            'title' => 'required|min:3',
            'image' => 'required|mimes:jpg,jpeg,png,gif',
            'video_path' => 'required|mimes:mp4'
        ]);

        $asset = new Asset();
        $asset->title = $request->input('title');

        // Crear directorios si no existen
        if (!Storage::disk('public')->exists('images')) {
            Storage::disk('public')->makeDirectory('images');
        }
        if (!Storage::disk('public')->exists('videos')) {
            Storage::disk('public')->makeDirectory('videos');
        }

        // Subida de la miniatura
        $image = $request->file('image');
        if ($image) {
            $image_path = time() . $image->getClientOriginalName();
            Storage::disk('public')->put('images/' . $image_path, File::get($image));
            $asset->image = $image_path;
        }

        // Subida del video
        $video_file = $request->file('video_path');
        if ($video_file) {
            $video_path = time() . $video_file->getClientOriginalName();
            Storage::disk('public')->put('videos/' . $video_path, File::get($video_file));
            $asset->video_path = $video_path;
        }

        $asset->save();

        return redirect()->route('asset.create')->with(array(
            'message' => 'El asset se ha subido correctamente'
        ));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getImage($filename)
    {
        $file = Storage::disk('images')->get($filename);
        return new Response($file, 200);
    }
    public function getVideo($filename)
    {
        $file = Storage::disk('videos')->get($filename);
        return new Response($file, 200);
    }
}
