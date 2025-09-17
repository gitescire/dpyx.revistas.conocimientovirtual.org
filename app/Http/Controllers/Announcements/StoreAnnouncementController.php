<?php

namespace App\Http\Controllers\Announcements;

use App\Events\EvaluationCreatedEvent;
use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class StoreAnnouncementController extends Controller
{
    public function __invoke(Request $request)
    {
        DB::transaction(function () use ($request) {

            $announcement = new Announcement;
            $announcement->initial_date = $request->initial_date;
            $announcement->final_date = $request->final_date;
            $announcement->save();

            foreach (Repository::get() as $repository) {

                $latestEvaluation = $repository->evaluations()->latest()->first();

                $evaluation = $repository->evaluations()->create([
                    'evaluator_id' => $latestEvaluation->evaluator_id,
                ]);

                event(new EvaluationCreatedEvent($evaluation));

                $evaluation->assignEvaluator($latestEvaluation->evaluator_id);
                $evaluation->assignAnnouncement($announcement);
            }
        });

        Alert::success('¡Convocatoria creada!');
        return redirect()->route('announcements.index');
    }
}
