<?php
namespace initialize;
use Symfony\Component\HttpFoundation\Request;

class RequestFactory
{
    static public function create()
    {
        return Request::createFromGlobals();
    }
}
 ?>
