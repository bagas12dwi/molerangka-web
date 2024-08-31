<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Material extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function submateri()
    {
        return $this->hasMany('\App\Models\SubMaterial');
    }

    public function getSubMateriWithStatusForUser($userId)
    {
        // Fetch all submateri along with a flag indicating whether it's done for the specific user
        return $this->submateri()
            ->leftJoin('user_scores', function ($join) use ($userId) {
                $join->on('sub_materials.id', '=', 'user_scores.sub_material_id')
                    ->where('user_scores.user_id', '=', $userId);
            })
            ->select('sub_materials.*', DB::raw('IF(user_scores.sub_material_id IS NOT NULL, true, false) AS is_done'))
            ->get();
    }
}
