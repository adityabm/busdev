<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_name');
            $table->string('slug');
            $table->integer('user_id');
            $table->text('description')->nullable();
            $table->decimal('target');
            $table->decimal('invest')->default(0);
            $table->integer('timeline_start');
            $table->integer('timeline_end');
            $table->decimal('percentage');
            $table->text('tags')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('project_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id');
            $table->string('project_file');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('project_image', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id');
            $table->string('image');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('project_invest', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id');
            $table->integer('user_id');
            $table->decimal('invest');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
