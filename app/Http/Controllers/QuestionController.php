<?php

namespace App\Http\Controllers;

use App\DataTables\QuestionDataTable;
use App\DataTables\QuizSubMateriDataTable;
use App\Models\Question;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Option;
use App\Models\SubMaterial;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(QuizSubMateriDataTable $datatable)
    {
        return $datatable->render('pages.quiz-sub-materi.index', [
            'title' => 'Quiz Sub Materi'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $submateri = SubMaterial::all();
        $jumlahSubmateri = count($submateri);
        if ($jumlahSubmateri > 0) {
            return view('pages.quiz-sub-materi.add', [
                'title' => 'Quiz Sub Materi',
                'submateri' => $submateri
            ]);
        } else {
            return view('pages.404', [
                'message' => 'Sub materi belum ditambahkan, silahkan tambahkan submateri terlebih dahulu !',
                'link' => 'sub-materi',
                'btn' => 'Tambahkan Sub Materi'
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'question_text' => 'required',
            'sub_material_id' => 'required',
        ]);

        $question = Question::create($validatedData);

        for ($i = 1; $i < 5; $i++) {
            $jawaban = 'option_text' . $i;
            $is_benar = $request->has('is_correct' . $i); // Menggunakan has() untuk mengecek apakah checkbox ditandai
            Option::create([
                'question_id' => $question->id,
                'option_text' => $request->input($jawaban),
                'is_correct' => $is_benar,
            ]);
        }

        return redirect()->intended('quiz-sub-materi')->with('success', 'Pertanyaan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(QuestionDataTable $datatable)
    {
        return $datatable->render('pages.quiz-sub-materi.question.index', [
            'title' => 'Pertanyaan'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $quiz_sub_materi)
    {
        $submateri = SubMaterial::all();
        return view('pages.quiz-sub-materi.question.edit', [
            'title' => 'Pertanyaan',
            'question' => $quiz_sub_materi,
            'submateri' => $submateri
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $quiz_sub_materi)
    {
        $validatedData = $request->validate([
            'question_text' => 'required',
            'sub_material_id' => 'required',
        ]);

        $question = Question::where('id', $quiz_sub_materi->id)->update($validatedData);
        $questionId = $quiz_sub_materi->id;

        $maxOptionId = $quiz_sub_materi->option()->max('id');
        $minOptionId = $quiz_sub_materi->option()->min('id');

        foreach ($quiz_sub_materi->option as $option) {
            $optionId = $option->id;
            $jawaban = 'option_text' . $optionId;
            $is_benar = $request->has('is_correct' . $optionId);
            $option->update([
                'option_text' => $request->input($jawaban),
                'is_correct' => $is_benar,
            ]);
        }

        return redirect()->intended('quiz-sub-materi/' . $quiz_sub_materi->sub_material_id)->with('success', 'Pertanyaan berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $quiz_sub_materi)
    {
        Question::destroy($quiz_sub_materi->id);
        return redirect()->intended('quiz-sub-materi')->with('success', 'Pertanyaan berhasil dihapus!');
    }
}
