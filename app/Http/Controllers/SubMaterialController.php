<?php

namespace App\Http\Controllers;

use App\DataTables\SubMaterialDataTable;
use App\Models\SubMaterial;
use App\Http\Requests\StoreSubMaterialRequest;
use App\Http\Requests\UpdateSubMaterialRequest;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SubMaterialDataTable $datatable)
    {
        return $datatable->render('pages.sub-materi.index', [
            'title' => 'Sub Materi'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $materi = Material::all();
        $jumlahMateri = count($materi);

        if ($jumlahMateri > 0) {
            return view('pages.sub-materi.add', [
                'title' => 'Sub Materi',
                'materi' => $materi
            ]);
        } else {
            return view('pages.404', [
                'message' => 'Materi belum ditambahkan, silahkan tambahkan Materi terlebih dahulu !',
                'link' => 'materi',
                'btn' => 'Tambahkan Materi'
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'material_id' => 'required',
            'description' => 'required',
            'img_path' => 'image'
        ]);

        $validatedData['caption'] = $request->input('caption');


        if ($request->file('img_path')) {
            $validatedData['img_path'] = $request->file('img_path')->store('materi');
        }


        SubMaterial::create($validatedData);
        return redirect()->intended('sub-materi')->with('success', 'Sub Materi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubMaterial $sub_materi)
    {
        return view('pages.sub-materi.show', [
            'title' => 'Sub Materi',
            'sub_materi' => $sub_materi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubMaterial $sub_materi)
    {
        $materi = Material::all();
        return view('pages.sub-materi.edit', [
            'title' => 'Sub Materi',
            'materi' => $materi,
            'sub_materi' => $sub_materi
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubMaterial $sub_materi)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'material_id' => 'required',
            'description' => 'required',
            'img_path' => 'image'
        ]);

        $validatedData['caption'] = $request->input('caption');

        if ($request->file('img_path')) {
            if ($request->imgOld) {
                Storage::delete($request->imgOld);
            }
            $validatedData['img_path'] = $request->file('img_path')->store('materi');
        }

        SubMaterial::where('id', $sub_materi->id)->update($validatedData);
        return redirect()->intended('sub-materi')->with('success', 'Sub Materi berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubMaterial $sub_materi)
    {
        Storage::delete($sub_materi->img_path);
        SubMaterial::destroy($sub_materi->id);
        return redirect()->intended('sub-materi')->with('success', 'Sub Materi berhasil dihapus!');
    }
}
