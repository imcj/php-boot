<?php
namespace test;

use PHPUnit\Framework\TestCase;
use core\Container;
use example\MainController;
use example\Registration;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class RequestMock extends Request
{
	public function get($key, $default = null)
	{
		switch ($key) {
			case "username":
				return "CJ";
			default:
				return null;
		}
	}
}

class ExampleTest extends TestCase
{
    public function testHello()
	{
		$this->assertTrue(true);
		$request = new RequestMock();
		$validator = Container::shared()->get(ValidatorInterface::class);


		$controller = new MainController();
		$controller->request = $request;
		$controller->example = new \Example();
		$controller->index($request, $validator);
	}

}
