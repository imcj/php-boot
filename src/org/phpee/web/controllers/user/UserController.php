<?php
namespace org\phpee\web\controllers\user;

use Symfony\Component\HttpFoundation\Request;
use org\phpee\domain\model\user\User;
use org\phpee\domain\model\user\UserRepository;
use Symfony\Component\Validator\Validator\ValidatorInterface;;

class UserController
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
    private $repository;

    /**
     * @Inject
     * @var RegistrationAssembler
     */
    private $assembler;

    /**
     * @Inject
     * @var ValidatorInterface
     */
    private $validator;

    public function postIndex()
    {
        $registration = $this->assembler->registration($this->request);
        $violation = $this->validator->validate($registration);
        $user = $this->assembler->user($registration);
        $this->repository->store($user);

        return $user;
    }
}