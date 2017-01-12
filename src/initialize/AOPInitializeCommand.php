<?php
namespace initialize;

class AOPInitializeCommand implements InitializeCommand
{
	public $cacheDirPath;

	public function __construct($cacheDirPath)
	{
		$this->cacheDirPath = $cacheDirPath;
	}

	public function execute()
	{
		$applicationAspectKernel = \core\ApplicationAspectKernel::getInstance();
		$applicationAspectKernel->init(array(
		        'debug' => true, // use 'false' for production mode
		        // Cache directory
		        'cacheDir'  => $this->cacheDirPath . '/../var/cache/aspect',
		        // Include paths restricts the directories where aspects should be applied, or empty for all source files
		        'includePaths' => array(
		            __DIR__ . '/src/'
		        )
		));
	}
}
