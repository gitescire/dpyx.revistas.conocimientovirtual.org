<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObservationsHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observations_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('answer_history_id');
            $table->text('description');
            $table->text('files_paths')->nullable();
            $table->timestamps();

            $table->foreign('answer_history_id')->references('id')->on('answers_history')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('observations_history');
    }
}
