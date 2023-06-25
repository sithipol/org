<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;
    protected $fillable = [
        'survey_template_id',
        'status',
        'created_by'
    ];
    public function surveyTemplate()
    {
        return $this->belongsTo(SurveyTemplate::class, 'survey_template_id', 'id');
    }

    public function surveyAnswer()
    {
        return $this->hasMany(SurveyAnswer::class, 'survey_id', 'id');
    }
}
