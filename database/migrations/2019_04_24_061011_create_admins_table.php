<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('username',60)->unique();
            $table->string('password',60);
            $table->string('email',60)->unique();
            $table->tinyInteger('role')->default(1);
            $table->tinyInteger('status')->default(0);
            $table->string('avatar',120)->nullable();
            $table->string('phone',20)->nullable();
            $table->text('address')->nullable();

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
        Schema::dropIfExists('admins');
    }
}
