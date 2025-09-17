<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class StoreAccountController extends Controller
{

    public $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;

        // dd(Auth::user());

        // dd($userService(Auth::user()));

    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        // update user information
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();

        // update photo if required
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $path = Storage::disk('public')->putFileAs(
                'photos',
                $image,
                $fileName
            );
            $user->profile_photo_path = $path;
            $user->save();
        }


        $this->changePasswordIfRequired($request, $user);

        Alert::success('¡Tu cuenta ha sido modificada exitosamente!');
        return redirect()->route('users.account');
    }

    private function changePasswordIfRequired($request, $user){
        if ($request->change_password == 'on') {

            $passwordChanged = ($this->userService)($user)
                ->changePassword($request->current_password, $request->new_password, $request->new_password_repeated);

            if (!$passwordChanged) {
                Alert::warning('No fue posible actualizar la información', 'verifica que tu contraseña actual sea la correcta o que tu nueva contraseña coincida con el campo de repetir contraseña');
                return redirect()->back();
            }
        }
    }
}
