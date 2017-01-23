<?php
namespace example;

use Monolog\Logger;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class MainController
{
    /**
     * @Inject
     * @var Example
     */
    public $example;

    /**
     * @Inject
     * @var Request
     */
    public $request;

    public function __construct()
    {
        $this->log = new Logger(get_class($this));
    }

    public function index(Request $request, ValidatorInterface $validator/*,
		UserDAO $dao*/)
    {
		// I('get');
		// D('UserModel')->find()
        $registration = new Registration();
        $violation = $validator->validate($registration);
		// $user = $dao->findUser($registration->userID);
        // var_dump($violation);
        echo $this->request->get("username");
        $this->log->info($this->example->sayHello());
    }
}
