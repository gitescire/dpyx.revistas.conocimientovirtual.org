<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('repository_id');
            $table->unsignedBigInteger('evaluator_id')->nullable();
            $table->enum('status',['contestada','en revisión','revisado','en progreso'])->default('en progreso');
            $table->timestamps();

            $table->foreign('repository_id')->references('id')->on('repositories')->onDelete('cascade');
            $table->foreign('evaluator_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluations');
    }
}
