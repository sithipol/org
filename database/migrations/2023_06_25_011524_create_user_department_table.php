<?php

use App\Models\Department;
use App\Models\User;
use App\Models\UserDepartment;
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
        Schema::create((new UserDepartment())->getTable(), function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->unsignedInteger('user_id')->comment('FK @ user.id');
            $table->unsignedInteger('department_id')->comment('FK @ department.id');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on((new User())->getTable());

            $table->foreign('department_id')
                ->references('id')
                ->on((new Department())->getTable());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_department');
    }
};
