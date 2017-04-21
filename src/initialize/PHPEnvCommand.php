<?php
namespace initialize;

class PHPEnvCommand implements InitializeCommand
{
    private $rootDir;

    public function __construct($rootDir)
	{
		$this->rootDir = $rootDir;
	}

    public function execute()
    {
        $dotenv = new \Dotenv\Dotenv($this->rootDir . "/../");
        $dotenv->load();
    }
}