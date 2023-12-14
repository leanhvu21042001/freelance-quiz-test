<?php

class UserAnswerController extends BaseController
{
    public function index()
    {
        return $this->view('frontend.users.index');
    }

    public function show()
    {
        echo __METHOD__;
    }
}
