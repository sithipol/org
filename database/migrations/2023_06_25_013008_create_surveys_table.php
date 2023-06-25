<?php

use App\Models\Survey;
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
        Schema::create((new Survey())->getTable(), function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->unsignedInteger('survey_template_id')->comment('FK @ survey_template.id');
            $table->unsignedInteger('status')->nullable()->comment('1. active , 2. not active');
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by')->nullable();
            $table->timestamps();

            // $table->foreign('survey_type_id')
            //     ->references('id')
            //     ->on((new SurveyType())->getTable());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surveys');
    }
};
