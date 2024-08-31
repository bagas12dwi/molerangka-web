<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMaterial extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function material()
    {
        return $this->belongsTo('\App\Models\Material');
    }

    public function question()
    {
        return $this->hasMany('\App\Models\Question');
    }
}
