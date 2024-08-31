<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('\App\Models\User');
    }

    public function question()
    {
        return $this->belongsTo('\App\Models\Question');
    }

    public function option()
    {
        return $this->belongsTo('\App\Models\Option');
    }
}
