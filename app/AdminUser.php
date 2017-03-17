<?php

namespace App;
use App\Notifications\UserAdminResetPasswordNotification;

class AdminUser extends User
{
    protected  $table ="admin_users";

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserAdminResetPasswordNotification($token));
    }

    public function role()
    {
        return $this ->belongsToMany(role::class, 'role_admin_users');
    }
}
