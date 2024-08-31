<?php

namespace App\Http\Controllers;

use App\DataTables\MaterialDataTable;
use App\Models\Material;
use App\Http\Requests\StoreMaterialRequest;
use App\Http\Requests\UpdateMaterialRequest;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(MaterialDataTable $datatable)
    {
        return $datatable->render('pages.materi.index', [
            'title' => 'Materi'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.materi.add', [
            'title' => 'Materi'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ]);

        Material::create($validatedData);
        return redirect()->intended('/materi')->with('success', 'Materi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $materi)
    {
        return view('pages.materi.edit', [
            'title' => 'Materi',
            'materi' => $materi
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Material $materi)
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ]);

        Material::where('id', $materi->id)->update($validatedData);
        return redirect()->intended('/materi')->with('success', 'Materi berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $materi)
    {
        Material::destroy($materi->id);
        return redirect()->intended('/materi')->with('success', 'Materi berhasil dihapus!');
    }
}
