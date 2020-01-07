<?php


namespace Exceptions;
use Exception;
use ReflectionClass;

class Handler
{
    protected $exception;

    public function __construct(Exception $exception)
    {
        $this->exception = $exception;
    }
    public function respond()
    {
        $class = (new ReflectionClass($this->exception))->getShortName();
        //check if the exception provided has a handler and call it
        if (method_exists($this, $method = "handle{$class}")) {
            return $this->{$method}($this->exception);
        }

        //if exception is not handled throw unhandledException
        return $this->unhandledException($this->exception);
    }

    public function handleNotSameLengthException(Exception $exception)
    {
        return $exception->getMessage();
    }

    public function unhandledException(Exception $exception)
    {
        throw $exception;
    }


}