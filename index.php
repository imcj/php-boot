<?php

require_once('vendor/autoload.php');

use Monolog\Logger;
use DI\Container;
use DI\ContainerBuilder;
use DI\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
$log = new Logger('name');

use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Constraints as Assert;

$reader = new AnnotationReader();

$validator = Validation::createValidatorBuilder()
    // ->setApiVersion(Validation::API_VERSION_2_5)
    // ->addXmlMapping(__DIR__.'/validation.xml')
    ->enableAnnotationMapping($reader)
    ->getValidator();

class RequestFactory
{
    static public function create()
    {
        return Request::createFromGlobals();
    }
}

$builder = new \DI\ContainerBuilder();
$builder->setDefinitionCache(new Doctrine\Common\Cache\ArrayCache());
$builder->writeProxiesToFile(true, __DIR__ . '/var/cache/ioc');
$builder->useAnnotations(true);
$builder->addDefinitions([
    Request::class => \DI\factory([RequestFactory::class, "create"]),
    // ValidatorInterface::class, $validator
]);
$container = $builder->build();

// Initialize an application aspect container
$applicationAspectKernel = \core\ApplicationAspectKernel::getInstance();
$applicationAspectKernel->init(array(
        'debug' => true, // use 'false' for production mode
        // Cache directory
        'cacheDir'  => __DIR__ . '/var/cache/aspect',
        // Include paths restricts the directories where aspects should be applied, or empty for all source files
        'includePaths' => array(
            __DIR__ . '/src/'
        )
));

// echo Request::class;
$request = $container->get(Request::class);
// die($request);



$container->set(
    ValidatorInterface::class, $validator
);
// $container->set(Request::class, \DI\Factory([RequestFactory::class, "create"]));


/**
 *
 */
class Registration
{
    /**
     * @Assert\NotNull
     * @var string
     */
    public $username;
}

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

    public function index(Request $request, ValidatorInterface $validator)
    {
        $registration = new Registration();
        $violation = $validator->validate($registration);
        var_dump($violation);
        // echo $request->get("name", "CJ");
        $this->log->info($this->example->sayHello());
    }
}

$main = $container->get('MainController');
$container->call([$main, "index"]);
