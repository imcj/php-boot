<?php

/**
 * @Injectable(scope="prototype", lazy=true)
 */
class Example
{
    public function sayHello()
    {
        return "Hello world";
    }
}
