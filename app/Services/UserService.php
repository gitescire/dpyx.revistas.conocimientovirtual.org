<?php

namespace App\Services;

use App\Facades\Users\ChangePasswordFacade;
use App\Models\User;

class UserService
{

    public $user;

    public function __invoke(User $user)
    {
        $this->user = $user;
        return $this;
    }


    public function changePassword($currentPassword, $newPassword, $newPasswordRepeated)
    {
        return (new ChangePasswordFacade)($this->user)
            ->execute($currentPassword, $newPassword, $newPasswordRepeated);
    }
}
