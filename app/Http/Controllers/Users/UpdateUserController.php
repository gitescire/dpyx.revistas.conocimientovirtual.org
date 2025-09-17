<?php

namespace App\Http\Controllers\Users;

use App\Events\EvaluationCreatedEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Announcement;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UpdateUserController extends Controller
{
    public function __invoke(UpdateUserRequest $request, User $user)
    {

        if ($request->change_password == 'on') {

            if (!Hash::check($request->current_password, $user->password)) {
                Alert::warning('La contraseña actual no coincide');
                return redirect()->back();
            }

            if ($request->new_password != $request->new_password_repeated) {
                Alert::warning('La contraseña nueva no coincide.');
                return redirect()->back();
            }

            $user->password = bcrypt($request->new_password);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();

        $user->syncRoles($request->role);

        if ($user->hasRole('usuario') && $user->has_repositories) {
            $user->repositories()->first()->update([
                'name' => $request->repository_name,
                'responsible_id' => $user->id
            ]);


            $user->repositories()->first()->evaluations()->latest()->first()->update([
                'evaluator_id' => $request->evaluator_id
            ]);
        }

        if ($user->hasRole('usuario') && !$user->has_repositories) {
            $repository = $user->repositories()->create([
                'name' => $request->repository_name,
                'responsible_id' => $user->id
            ]);

            $evaluation = $repository->evaluations()->create([
                'evaluator_id' => $request->evaluator_id
            ]);

            if ($announcement = Announcement::latest()->first()) {
                $evaluation->assignAnnouncement($announcement);
            }

            $evaluation->assignRepository($repository);

            event(new EvaluationCreatedEvent($evaluation));
        }

        Alert::success('¡Usuario modificado!');
        return redirect()->route('users.index');
    }
}
