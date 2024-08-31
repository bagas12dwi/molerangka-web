<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Models\SubMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaterialController extends Controller
{
    public function getMateri(Request $request)
    {
        $user_id = $request->input('user_id');
        $materials = Material::all();
        foreach ($materials as $material) {
            $material->submateri = $material->getSubMateriWithStatusForUser($user_id);
        }

        if ($materials) {
            return ApiFormatter::createApi(200, 'success', $materials);
        } else {
            return ApiFormatter::createApi(400, 'failed', $materials);
        }
    }

    public function getDetailSubmateri($idSubmateri)
    {
        $data = SubMaterial::where('id', $idSubmateri)->first();

        if ($data) {
            return ApiFormatter::createApi(200, 'success', $data);
        } else {
            return ApiFormatter::createApi(400, 'failed', $data);
        }
    }
}
