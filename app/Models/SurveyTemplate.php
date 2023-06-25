<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyTemplate extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'survey_type_id',
        'status'
    ];
    public function scopeActive()
    {
        return $this->where('status', 1);
    }
    public function surveyType()
    {
        return $this->belongsTo(SurveyType::class, 'survey_type_id', 'id');
    }
    public function surveyChoice()
    {
        return $this->hasMany(SurveyTemplateChoice::class, 'survey_template_id', 'id');
    }
}
