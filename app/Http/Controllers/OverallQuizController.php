<?php

namespace App\Http\Controllers;

use App\DataTables\OverallQuizDataTable;
use App\Models\OverallQuiz;
use App\Http\Requests\StoreOverallQuizRequest;
use App\Http\Requests\UpdateOverallQuizRequest;
use App\Models\OverallOption;
use Illuminate\Http\Request;

class OverallQuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(OverallQuizDataTable $datatable)
    {
        return $datatable->render('pages.quiz.index', [
            'title' => 'Pertanyaan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.quiz.add', [
            'title' => 'Pertanyaan'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'question_text' => 'required',
        ]);

        $question = OverallQuiz::create($validatedData);

        for ($i = 1; $i < 5; $i++) {
            $jawaban = 'option_text' . $i;
            $is_benar = $request->has('is_correct' . $i); // Menggunakan has() untuk mengecek apakah checkbox ditandai
            OverallOption::create([
                'overall_quiz_id' => $question->id,
                'option_text' => $request->input($jawaban),
                'is_correct' => $is_benar,
            ]);
        }

        return redirect()->intended('quiz')->with('success', 'Pertanyaan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(OverallQuiz $overallQuiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OverallQuiz $quiz)
    {
        return view('pages.quiz.edit', [
            'title' => 'Pertanyaan',
            'question' => $quiz
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OverallQuiz $quiz)
    {
        $validatedData = $request->validate([
            'question_text' => 'required',
        ]);

        $question = OverallQuiz::where('id', $quiz->id)->update($validatedData);
        $questionId = $quiz->id;

        $maxOptionId = $quiz->option()->max('id');
        $minOptionId = $quiz->option()->min('id');

        foreach ($quiz->option as $option) {
            $optionId = $option->id;
            $optionTextKey = 'option_text' . $optionId;
            $isCorrectKey = 'is_correct' . $optionId;

            // Update option text
            $option->update([
                'option_text' => $request->input($optionTextKey),
                'is_correct' => $request->has($isCorrectKey), // Check if checkbox is checked
            ]);
        }

        return redirect()->intended('quiz/')->with('success', 'Pertanyaan berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OverallQuiz $quiz)
    {
        OverallQuiz::destroy($quiz->id);
        return redirect()->intended('quiz/')->with('success', 'Pertanyaan berhasil dihapus!');
    }
}
