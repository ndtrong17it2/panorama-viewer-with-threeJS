<?php

namespace App\Http\Controllers;

use App\TblImage;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Log;
use Illuminate\Filesystem\Filesystem;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = TblImage::all();
        return view('layout.panorama-view', compact('images'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layout.input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('inputFile');
        $srcName = $image->getClientOriginalName();

        $fileName = $request->filled('inputFileName') ? $request->inputFileName : pathinfo($srcName,PATHINFO_FILENAME);
        $dataImage = [
            'name' => $fileName,
            'src' => '/'.$srcName
        ];
        $createdImage = TblImage::create($dataImage);
        $this->makeAndSaveImage($image, $srcName, $createdImage->id);
        return redirect()->route('images.index')->with('success', 'File saved!'.$fileName);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(TblImage $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(TblImage $image)
    {
        return view('layout.edit-images', compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TblImage $image)
    {
        if($request->hasFile('inputFile'))
        {
            
            $newImage = $request->file('inputFile');
            $srcName = $newImage->getClientOriginalName();
            $this->makeAndSaveImage($newImage, $srcName, $image->id);
            $dataUpdate = [
                'name' => $request->filled('inputName') ? $request->inputName : pathinfo($srcName,PATHINFO_FILENAME),
                'src' => '/'.$srcName
            ];
        }else
        {
            $dataUpdate = [
                'name' => $request->filled('inputName') ? $request->inputName : pathinfo($image->src,PATHINFO_FILENAME)
            ];
        }
        
        $image->update($dataUpdate);
        return redirect()->route('images.index')->with('success', 'Image Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(TblImage $image)
    {
        $image->delete();
        $path = 'public/storageImage/'.$image->id;
        Storage::deleteDirectory($path);
        return redirect()->route('images.index')->with('success', 'Image Deleted!');
    }

    public function makeAndSaveImage(UploadedFile $image, string $imageSrc, int $imageId)
    {
        $img = Image::make($image);
        $img->stream();
        $path = 'public/storageImage/'.$imageId;
        Storage::deleteDirectory($path);
        Storage::makeDirectory($path);
        Storage::put($path.'/'.$imageSrc, $img);
    }
}
