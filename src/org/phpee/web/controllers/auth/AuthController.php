<?php
namespace org\phpee\web\controllers\auth;

use Symfony\Component\HttpFoundation\Request;
use org\phpee\domain\model\user\User;
use org\phpee\domain\model\user\AuthToken;
use org\phpee\domain\model\user\AuthRepository;
use org\phpee\domain\model\user\UserRepository;
use Symfony\Component\Validator\Validator\ValidatorInterface;;

class AuthController
{
    /**
     * @Inject
     * @var Request
     */
    private $request;

    /**
     * @Inject
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @Inject
     * @var AuthRepository
     */
    private $authRepository;

    /**
     * @Inject
     * @var SigninAssembler
     */
    private $assembler;

    /**
     * @Inject
     * @var ValidatorInterface
     */
    private $validator;

    public function postIndex()
    {
        $signin = $this->assembler->signin($this->request);
        
        $user = $this->userRepository->findByUsernameAndPassword(
            $signin->username, 
            $signin->password);

        $_token = hash("sha256", rand());
        $token = new AuthToken($_token, $user);
        $this->authRepository->store($token);

        return $token;
    }
}