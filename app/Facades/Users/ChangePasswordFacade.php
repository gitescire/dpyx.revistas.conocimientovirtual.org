<?php

namespace App\Facades\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ChangePasswordFacade
{

    public $user;

    public function __invoke(User $user)
    {
        $this->user = $user;
        return $this;
    }

    public function execute($currentPassword, $newPassword, $newPasswordRepeated)
    {
        if (!Hash::check($currentPassword, $this->user->password)) {
            return false;
        }

        if ($newPassword != $newPasswordRepeated) {
            return false;
        }

        $this->user->password = bcrypt($newPassword);
        $this->user->save();
        return true;
    }
}
