<?php

use App\Models\Evaluation;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationRepositoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluation__repository', function (Blueprint $table) {
            $table->unsignedBigInteger('evaluation_id');
            $table->unsignedBigInteger('repository_id');

            $table->foreign('evaluation_id')->references('id')->on('evaluations')->onDelete('cascade');
            $table->foreign('repository_id')->references('id')->on('repositories')->onDelete('cascade');
        });

        foreach (DB::table('evaluations')->get() as $evaluation) {
            DB::table('evaluation__repository')->insert([
                [
                    'evaluation_id' => $evaluation->id,
                    'repository_id' => $evaluation->repository_id
                ]
            ]);
        }

        Schema::table('evaluations', function (Blueprint $table) {
            $table->dropForeign('evaluations_repository_id_foreign');
            $table->dropColumn('repository_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluation__repository');
    }
}
