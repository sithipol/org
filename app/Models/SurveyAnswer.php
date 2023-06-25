<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyAnswer extends Model
{
    use HasFactory;

    public function surveyChoiceName()
    {
        return $this->belongsTo(SurveyTemplateChoice::class, 'answer', 'id');
    }
}
