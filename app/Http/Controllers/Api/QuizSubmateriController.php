<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Option;
use App\Models\Question;
use App\Models\UserAnswer;
use App\Models\UserScore;
use Illuminate\Http\Request;

class QuizSubmateriController extends Controller
{
    public function getQuestionsBySubMaterial(Request $request)
    {
        $subMaterialId = $request->input('sub_material_id');
        $questions = Question::where('sub_material_id', $subMaterialId)->with('option')->get();

        if ($questions->isEmpty()) {
            return ApiFormatter::createApi(404, 'Questions not found for the given sub-material ID');
        }

        return ApiFormatter::createApi(200, 'Questions retrieved successfully', $questions);
    }

    public function submitUserAnswers(Request $request)
    {
        $userId = $request->input('user_id');
        $questionId = $request->input('question_id');
        $optionId = $request->input('option_id');
        $option = Option::where('question_id', $questionId)->where('id', $optionId)->first();

        $iscorrect =  $option['is_correct'];

        $userAnswer = new UserAnswer();
        $userAnswer->user_id = $userId;
        $userAnswer->question_id = $questionId;
        $userAnswer->option_id = $optionId;
        $userAnswer->is_correct = $iscorrect;
        $userAnswer->save();

        $subMaterialId = Question::find($questionId)->sub_material_id;

        if ($userAnswer['is_correct'] == true) {
            $result = [
                'message' => 'Amazing',
                'option_id' => Option::find($optionId)->id,
                'answer' => Option::find($optionId)->option_text,
                'id_sub_material' => $subMaterialId,
                'is_correct' => true
            ];
        } else {
            $result = [
                'message' => 'Ups.. That is wrong',
                'option_id' => Option::find($optionId)->id,
                'answer' => Option::where('question_id', $questionId)->where('is_correct', true)->first()->option_text,
                'id_sub_material' => $subMaterialId,
                'is_correct' => false
            ];
        }

        return ApiFormatter::createApi(200, 'User answers submitted successfully', $result);
    }

    public function submitScore(Request $request)
    {
        $subMaterialId = $request->input('sub_material_id');
        $userId = $request->input('user_id');
        $score = $request->input('score');

        $userScore = UserScore::create([
            'sub_material_id' => $subMaterialId,
            'user_id' => $userId,
            'score' => $score
        ]);

        $data = [
            'sub_material_id' => (int)$userScore->sub_material_id,
            'user_id' => (int)$userScore->user_id,
            'score' => (int)$userScore->score,
        ];

        return ApiFormatter::createApi(200, 'success', $data);
    }
}
