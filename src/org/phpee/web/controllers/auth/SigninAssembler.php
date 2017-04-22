<?php
namespace org\phpee\web\controllers\auth;

use Symfony\Component\HttpFoundation\Request;
use org\phpee\domain\model\user\User;

/**
 * @Injectable
 */
class SigninAssembler
{
    public function signin(Request $request)
    {
        $signinRequest = new SigninRequest();
        $signinRequest->username = $request->get("username");
        $signinRequest->password = hash('sha256', $request->get("password"));

        return $signinRequest;
    }
}
