<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyType extends Model
{
    use HasFactory;
    public function scopeActive($qeury)
    {
        return $qeury->where('status', 1);
    }
}
