<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function subMaterial()
    {
        return $this->belongsTo('\App\Models\SubMaterial');
    }

    public function option()
    {
        return $this->hasMany('\App\Models\Option');
    }
}
