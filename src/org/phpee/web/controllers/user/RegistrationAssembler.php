<?php
namespace org\phpee\web\controllers\user;

use Symfony\Component\HttpFoundation\Request;
use org\phpee\domain\model\user\User;

/**
 * @Injectable
 */
class RegistrationAssembler
{

    public function registration(Request $request)
    {
        $registration = new Registration();
        $registration->username = $request->get("username");
        $registration->password = hash('sha256', $request->get("password"));
        $registration->email = $request->get("email");
        $registration->passwordConfirm = hash('sha256', $request->get("password_confirm"));

        return $registration;
    }

    public function user(Registration $registration)
    {
        $user = new User(
            $registration->username,
            $registration->password,
            $registration->email
        );

        return $user;
    }
}