<?php

namespace App\Http\Controllers;

use App\DataTables\OverallUserScoreDataTable;
use App\Models\OverallUserScore;
use App\Http\Requests\StoreOverallUserScoreRequest;
use App\Http\Requests\UpdateOverallUserScoreRequest;

class OverallUserScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(OverallUserScoreDataTable $datatable)
    {
        return $datatable->render('pages.quiz.result.index', [
            'title' => 'Hasil Quiz'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOverallUserScoreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(OverallUserScore $overallUserScore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OverallUserScore $overallUserScore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOverallUserScoreRequest $request, OverallUserScore $overallUserScore)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OverallUserScore $overallUserScore)
    {
        //
    }
}
