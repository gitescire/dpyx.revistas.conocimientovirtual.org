<?php

namespace App\Http\Controllers\Users;

use App\Events\EvaluationCreatedEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\Announcement;
use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class StoreUserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StoreUserRequest $request)
    {
        DB::transaction(function () use ($request) {

            $user = new User;
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->name = $request->name;
            $user->save();

            $user->assignRole($request->role);

            if ($user->hasRole('usuario')) {
                $repository = $user->repositories()->create([
                    'name' => $request->repository_name,
                    'responsible_id' => $user->id
                ]);
                $evaluation = $repository->evaluations()->create([
                    'evaluator_id' => $request->evaluator_id,
                ]);

                $evaluation->assignRepository($repository);

                if ($announcement = Announcement::latest()->first()) {
                    $evaluation->assignAnnouncement($announcement);
                }

                event(new EvaluationCreatedEvent($evaluation));
            }
        });


        Alert::success('¡Usuario agregado!', 'El usuario ha sido añadido a la base de datos.');
        return redirect()->route('users.index');
    }
}
