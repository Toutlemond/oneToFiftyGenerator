<?php

interface Handler
{
    public function setNext(Handler $handler): Handler;
    public function handle(string $request, bool $activate = false): ?string;
}


abstract class AbstractHandler implements Handler
{
    private $nextHandler;
    public function setNext(Handler $handler): Handler
    {
        $this->nextHandler = $handler;
        return $handler;
    }

    public function handle(string $request, bool $activate = false): ?string
    {
        if ($this->nextHandler) {
            return $this->nextHandler->handle($request, $activate);
        }
        return null;
    }
}

class DivisionByFiveHandler extends AbstractHandler
{
    public function handle(string $request, bool $activate = false): ?string
    {
        if (($request % 5) === 0) {
            echo "да";
            return parent::handle($request, true);
        } else {
            return parent::handle($request, $activate);
        }
    }

}

class DivisionBySevenHandler extends AbstractHandler
{
    public function handle(string $request, bool $activate = false): ?string
    {
        if (($request % 7) === 0) {
            echo "нет";
            return parent::handle($request, true);
        } else {
            return parent::handle($request, $activate);
        }
    }
}

class FinalValueHandler extends AbstractHandler
{
    public function handle(string $request, bool $activate = false): ?string
    {
        if ($activate != true) {
            return $request;
        } else {
            return '';
        }
    }
}
