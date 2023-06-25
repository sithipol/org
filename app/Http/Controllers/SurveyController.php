<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\SurveyAnswer;
use App\Models\SurveyTemplate;
use App\Models\SurveyTemplateChoice;
use App\Models\SurveyType;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SurveyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create(Request $request)
    {
        $survey_template = SurveyTemplate::active()->get();
        if ($request->isMethod('post')) {
            DB::beginTransaction();

            try {
                foreach ($request->choice as $keyTemplate => $valueTemplate) {
                    $id = Survey::insert([
                        'name' => $keyTemplate,
                        'status' => 1,
                        'created_by' => Auth::user()->id
                    ]);
                    foreach ($valueTemplate as $keyChoice => $valChoice) {
                        SurveyAnswer::insert([
                            'survey_id' => $id,
                            'answer' => $valChoice,
                        ]);
                    }
                }
                DB::commit();
                return redirect()->route('survey.list')->with('success', 'success');
            } catch (Exception $e) {
                DB::rollBack();
                return redirect()->route('survey.list')->with('error', $e->getMessage());
            }
        }

        return view('survey.create', compact('survey_template'));
    }
    public function list(Request $request)
    {
        $survey = Survey::all();

        foreach ($survey as $key => $val) {
            // dd($val->surveyAnswer);
        }
        return view('survey.list', compact('survey'));
    }
    public function templateList(Request $request)
    {
        $survey_type = SurveyType::active()->get();
        $survey_template = SurveyTemplate::active()->get();

        return view('survey.template-list', compact('survey_type', 'survey_template'));
    }
    public function template(Request $request)
    {

        $survey_type = SurveyType::active()->get();

        if ($request->isMethod('post')) {
            DB::beginTransaction();

            try {
                $template = SurveyTemplate::create(request()->all());
                // dd($request->choice);
                foreach ($request->choice[$request->survey_type_id] as $key => $value) {
                    SurveyTemplateChoice::create([
                        'survey_template_id' => $request->survey_type_id,
                        'name' => $value
                    ]);
                }
                DB::commit();
                return redirect()->route('survey.template-list')->with('success', "success");
            } catch (Exception $e) {
                return redirect()->route('survey.template-list')->with('error', $e->getMessage());
            }
        }

        return view('survey.template', compact('survey_type'));
    }
}
