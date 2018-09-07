<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Storage;

use App\Http\Requests\MultimedRequest;
use App\Multimed;


class AdminImagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thumbnails = Multimed::where('image_use_type', 'thumbnail')->orderBy('created_at', 'desc')->get();
        $headers = Multimed::where('image_use_type', 'header')->orderBy('created_at', 'desc')->get();
        $general = Multimed::where('image_use_type', 'general')->orderBy('created_at', 'desc')->get();

        $images = ['thumbnails' => $thumbnails, 'headers' => $headers, 'general' => $general];
        // return $images;
        return view('admin.images.images')->with([
            'images' => $images
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $image = new Multimed();
        $image->attr = 'Zachary Young';
        $image->attr_link = 'https://zerovector.space';
        $image->license = 'CC BY 4.0';
        $image->license_link = 'https://creativecommons.org/licenses/by/4.0/';

        return view('admin.images.imageCreate')->with([
            'creating' => true,
            'image' => $image
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MultimedRequest $request)
    {
        if ($request->hasFile('file') && $request->file('file')->isValid())
        {
            // return $request->input();
            $file = $request->file('file');
            $input = $request->input();
            $safename = strtolower(str_replace(' ', '-', $request->input('title')));
            $filename = $safename . '.' . $file->getClientOriginalExtension();

            $imageDir = '/res/fileUploads/images/' . $input['image_use_type'];

            $request->file('file')->move(public_path() . $imageDir, $filename);
            Multimed::create([
                'title' => $input['title'],
                'alt' => $input['alt'],
                'attr' => $input['attr'],
                'attr_link' => $input['attr_link'],
                'license' => $input['license'],
                'license_link' => $input['license_link'],
                'image_use_type' => $input['image_use_type'],
                'safename' => $safename,
                'folder' => $imageDir,
                'filename' => $filename,
                'filetype' => $file->getClientMimeType(),
                'extension' => $file->getClientOriginalExtension(),
                'filesize' => $file->getClientSize(),
            ]);

            return redirect('/admin/images');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Multimed $image)
    {
        return view('admin.images.image')->with([
            'image' => $image
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Multimed $image)
    {
        return view('admin.images.imageEdit')->with([
            'image' => $image,
            'creating' => false
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Multimed $file)
    {
        $safename = strtolower(str_replace(' ', '-', $request->input('title')));
        $filename = $safename . '.' . $file->extension;

        $persist['title'] = $request->input('title');
        $persist['alt'] = $request->input('alt');
        $persist['attr'] = $request->input('attr');
        $persist['attr_link'] = $request->input('attr_link');
        $persist['license'] = $request->input('license');
        $persist['license_link'] = $request->input('license_link');
        $persist['safename'] = $safename;
        $persist['filename'] = $filename;
        $persist['image_use_type'] = $request->input('image_use_type');
        
        $path = substr($file->folder, 4);
        $newpath = "/fileUploads/images/" . $request->input()['image_use_type'];

        $persist['folder'] = '/res' . $newpath;

        if ($file->filename != $filename || $file->image_use_type != $persist['image_use_type'])
            Storage::move($path . '/' . $file->filename, $newpath . '/' . $filename);

        $file->update($persist);

        return redirect('/admin/images');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Multimed $file)
    {
        $file->delete();

        return redirect('/admin/images');
    }
}
