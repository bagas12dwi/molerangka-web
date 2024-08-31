<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\OverallUserScore;
use App\Models\SubMaterial;
use App\Models\User;
use App\Models\UserScore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AchievementController extends Controller
{
    public function getAchievementSubmateri(Request $request)
    {
        $userId = $request->input('user_id');
        $data = UserScore::join('sub_materials', 'user_scores.sub_material_id', '=', 'sub_materials.id')
            ->where('user_scores.user_id', $userId)
            ->orderBy('user_scores.created_at', 'DESC')
            ->select('sub_materials.name', 'user_scores.*')
            ->get();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function getAchievement(Request $request)
    {
        $userId = $request->input('user_id');

        $data = OverallUserScore::where('user_id', $userId)->orderBy('created_at', 'DESC')->first();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Success');
        }
    }

    public function calculateProgres(Request $request)
    {
        $userId = $request->input('user_id');
        $user = User::where('id', $userId)->first();
        $allTask = count(SubMaterial::get());
        $taskDone = SubMaterial::leftJoin('user_scores', function ($join) use ($userId) {
            $join->on('sub_materials.id', '=', 'user_scores.sub_material_id')
                ->where('user_scores.user_id', '=', $userId);
        })
            ->select('sub_materials.*', DB::raw('IF(user_scores.sub_material_id IS NOT NULL, true, false) AS is_done'))
            ->get();

        $countTaskDone = $taskDone->filter(function ($task) {
            return $task->is_done === 1;
        })->count();

        $persentase = ($countTaskDone ?? 0 / $allTask ?? 0) * 100 / 100;

        if ($persentase == 0) {
            $msg = "$user->name, start your journey towards remarkable achievements now!";
        } else if ($persentase == 100) {
            $msg = 'Great Job, ' . $user->name . ' you are finished your achievement';
        } else {
            $msg = 'Great Job, ' . $user->name . ' Complete your achievements now!';
        }


        $data = [
            'allTask' => $allTask,
            'taskDone' => $countTaskDone,
            'persentase' => $persentase,
            'msg' => $msg
        ];

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}
