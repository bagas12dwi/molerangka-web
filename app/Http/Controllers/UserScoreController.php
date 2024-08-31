<?php

namespace App\Http\Controllers;

use App\DataTables\UserScoreDataTable;
use App\Models\UserScore;
use App\Http\Requests\StoreUserScoreRequest;
use App\Http\Requests\UpdateUserScoreRequest;

class UserScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UserScoreDataTable $datatable)
    {
        return $datatable->render('pages.quiz-sub-materi.result.index', [
            'title' => 'Hasil Quiz Submateri'
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
    public function store(StoreUserScoreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserScore $userScore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserScore $userScore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserScoreRequest $request, UserScore $userScore)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserScore $userScore)
    {
        //
    }
}
