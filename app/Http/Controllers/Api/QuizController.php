<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\OverallOption;
use App\Models\OverallQuiz;
use App\Models\OverallUserAnswer;
use App\Models\OverallUserScore;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function getQuestion()
    {
        $question = OverallQuiz::with('option')->get();

        if ($question->isEmpty()) {
            return ApiFormatter::createApi(404, 'Questions not found');
        }

        return ApiFormatter::createApi(200, 'Questions retrieved successfully', $question);
    }

    public function submitUserAnswers(Request $request)
    {
        $userId = $request->input('user_id');
        $questionId = $request->input('question_id');
        $optionId = $request->input('option_id');
        $option = OverallOption::where('overall_quiz_id', $questionId)->where('id', $optionId)->first();

        $isCorrect = $option['is_correct'];

        $userAnswer = new OverallUserAnswer();
        $userAnswer->user_id = $userId;
        $userAnswer->overall_quiz_id = $questionId;
        $userAnswer->overall_option_id = $optionId;
        $userAnswer->is_correct = $isCorrect;
        $userAnswer->save();

        if ($userAnswer['is_correct'] == true) {
            $result = [
                'message' => 'Amazing',
                'option_id' => OverallOption::find($optionId)->id,
                'answer' => OverallOption::find($optionId)->option_text,
                'id_quiz' => $questionId,
                'is_correct' => true
            ];
        } else {
            $result = [
                'message' => 'Ups.. That is wrong',
                'option_id' => OverallOption::find($optionId)->id,
                'answer' => OverallOption::find($optionId)->option_text,
                'id_quiz' => $questionId,
                'is_correct' => false
            ];
        }

        return ApiFormatter::createApi(200, 'User answers submitted successfully', $result);
    }

    public function submitScore(Request $request)
    {
        $userId = $request->input('user_id');
        $score = $request->input('score');

        $userScore = OverallUserScore::create([
            'user_id' => $userId,
            'score' => $score
        ]);

        $data = [
            'user_id' => (int)$userScore->user_id,
            'score' => (int)$userScore->score,
        ];

        return ApiFormatter::createApi(200, 'success', $data);
    }
}
