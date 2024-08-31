<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OverallQuiz extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function option()
    {
        return $this->hasMany('\App\Models\OverallOption');
    }
}
