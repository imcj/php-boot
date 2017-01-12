<?php
namespace initialize;

use DI\Container;
use DI\ContainerBuilder;
use DI\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Constraints as Assert;

class IOCInitializeCommand implements InitializeCommand
{
	public $cacheDirPath;

	public function __construct($cacheDirPath)
	{
		$this->cacheDirPath = $cacheDirPath;
	}

	public function execute()
	{
		$builder = new \DI\ContainerBuilder();
		$builder->setDefinitionCache(new \Doctrine\Common\Cache\ArrayCache());
		$builder->writeProxiesToFile(true, $this->cacheDirPath . '/../var/cache/ioc');
		$builder->useAnnotations(true);
		$builder->addDefinitions([
		    Request::class => \DI\factory([RequestFactory::class, "create"]),
		    // ValidatorInterface::class, $validator
		]);
		$container = $builder->build();

		$reader = new AnnotationReader();

		$validator = Validation::createValidatorBuilder()
		    // ->setApiVersion(Validation::API_VERSION_2_5)
		    // ->addXmlMapping(__DIR__.'/validation.xml')
		    ->enableAnnotationMapping($reader)
		    ->getValidator();

		$container->set(
		    ValidatorInterface::class, $validator
		);

		$containerManager = \core\Container::shared();
		$containerManager->setContainer($container);
	}
}
