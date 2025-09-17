<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncementEvaluationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcement__evaluation', function (Blueprint $table) {
            $table->unsignedBigInteger('announcement_id');
            $table->unsignedBigInteger('evaluation_id');

            $table->foreign('announcement_id')->references('id')->on('announcements')->onDelete('CASCADE');
            $table->foreign('evaluation_id')->references('id')->on('evaluations')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('announcement__evaluation');
    }
}
