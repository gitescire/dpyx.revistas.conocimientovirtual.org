<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('evaluation_history_id');
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('choice_id')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('evaluation_history_id')->references('id')->on('evaluations_history')->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->foreign('choice_id')->references('id')->on('choices')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers_history');
    }
}
