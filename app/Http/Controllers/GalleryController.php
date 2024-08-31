<?php

namespace App\Http\Controllers;

use App\DataTables\GalleryDataTable;
use App\Models\Gallery;
use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GalleryDataTable $datatable)
    {
        return $datatable->render('pages.gallery.index', [
            'title' => 'Gallery'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.gallery.add', [
            'title' => 'Gallery'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'caption' => 'required',
            'img_path' => 'required | image'
        ]);

        $validatedData['img_path'] = $request->file('img_path')->store('galeri');
        $validatedData['link'] = $request->input('link');

        Gallery::create($validatedData);
        return redirect()->intended('galeri')->with('success', 'Galeri berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $galeri)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $galeri)
    {
        return view('pages.gallery.edit', [
            'title' => 'Gallery',
            'galeri' => $galeri
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $galeri)
    {
        $validatedData = $request->validate([
            'caption' => 'required',
            'img_path' => 'image'
        ]);

        if ($request->file('img_path')) {
            if ($request->oldImg) {
                Storage::delete($request->imgOld);
            }
            $validatedData['img_path'] = $request->file('img_path')->store('galeri');
        }
        $validatedData['link'] = $request->input('link');

        Gallery::where('id', $galeri->id)->update($validatedData);
        return redirect()->intended('galeri')->with('success', 'Galeri berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $galeri)
    {
        Storage::delete($galeri->img_path);
        Gallery::destroy($galeri->id);
        return redirect()->intended('galeri')->with('success', 'Galeri berhasil dihapus!');
    }
}
