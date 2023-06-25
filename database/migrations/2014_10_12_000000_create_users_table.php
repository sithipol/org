<?php

use App\Models\Department;
use App\Models\Group;
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
        Schema::create((new User())->getTable(), function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->unsignedInteger('user_id')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedInteger('status');
            $table->unsignedInteger('group_id')->nullable()->comment('FK @ group.id');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists((new UserDepartment())->getTable());
        Schema::dropIfExists((new Department())->getTable());
        Schema::dropIfExists((new User())->getTable());
    }
};
