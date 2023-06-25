<?php

use App\Models\Department;
use App\Models\User;
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
        Schema::create((new Department())->getTable(), function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('name', 100)->comment('ชื่อแผนก');
            $table->unsignedInteger('user_id')->nullable()->comment('FK @ user.id');
            $table->unsignedInteger('status')->nullable()->comment('สถานะ');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on((new User())->getTable())
                ->cascadeOnDelete()
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('department');
    }
};
