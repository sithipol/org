<?php

use App\Models\SurveyTemplate;
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
        Schema::create('survey_template_choices', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->unsignedInteger('survey_template_id')->comment('FK @ survey_template.id');
            $table->text('name')->comment('choice name');
            $table->timestamps();

            $table->foreign('survey_template_id')
                ->references('id')
                ->on((new SurveyTemplate())->getTable());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_template_choices');
    }
};
