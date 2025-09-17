<?php

use App\Models\Announcement;
use App\Models\Evaluation;
use App\Models\Repository;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AssignEvaluationsToAllRepositories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach (Repository::doesntHave('evaluations')->get() as $repository) {
            $evaluation = $repository->evaluations()->create([
                'evaluator_id' => User::evaluators()->first()->id
            ]);
        }

        if ($announcement = Announcement::latest()->first()) {
            foreach (Evaluation::doesntHave('announcements')->get() as $evaluation) {
                $evaluation->assignAnnouncement($announcement);
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
