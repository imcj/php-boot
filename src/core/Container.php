<?php
namespace core;

class Container
{
	private $container;
	static private $shared = null;

	public function __construct()
	{

	}

	public function setContainer($container)
	{
		$this->container = $container;
	}

	static public function shared()
	{
		if (null == Container::$shared) {
			Container::$shared = new Container();
		}

		return Container::$shared;
	}

	public function __call($method, $args)
	{
		$ref = new \ReflectionClass(get_class($this->container));
		$refMethod = $ref->getMethod($method);
		return $refMethod->invokeArgs($this->container, $args);
	}
}
