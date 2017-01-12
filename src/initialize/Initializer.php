<?php
namespace initialize;

class Initializer
{
	public $initializeCommands = [];

	public function addCommand(InitializeCommand $command)
	{
		$this->initializeCommands[] = $command;
	}

	public function run()
	{
		foreach ($this->initializeCommands as $command)
			$command->execute();
	}
}
 ?>
