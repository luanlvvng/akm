<?php

class ErrorsController extends ControllerBase
{
    public function initialize()
    {
        debug_backtrace();
        $this->tag->setTitle('Oops!');
        parent::initialize();
    }

    public function show404Action()
    {

    }

    public function show401Action()
    {

    }

    public function show500Action()
    {

    }
}
