<?php

use App\Models\SurveyTemplate;
use App\Models\SurveyType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create((new SurveyTemplate())->getTable(), function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->unsignedInteger('survey_type_id')->comment('FK @ survey_type.id');
            $table->unsignedInteger('status')->comment('1. active , 2. not active');
            $table->text('name')->comment('type name');
            $table->timestamps();

            $table->foreign('survey_type_id')
                ->references('id')
                ->on((new SurveyType())->getTable());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_templates');
    }
};
