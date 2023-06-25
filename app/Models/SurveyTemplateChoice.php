<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyTemplateChoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'survey_template_id',
        'name',
    ];
}
