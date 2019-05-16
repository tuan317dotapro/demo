<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();

        Schema::create('staff', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('name_staff',100)->unique();
            $table->integer('rooms_id')->unsigned();
            $table->integer('rankings_id')->unsigned();
            $table->integer('projects_id')->unsigned();
            $table->date('birth');
            $table->string('gender',20);
            $table->text('address');
            $table->string('email',60)->unique();
            $table->string('phone',50)->unique();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();

            // ràng buộc với table Room
            $table->foreign('rooms_id')
            ->references('id')->on('rooms')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('staff');
    }
}