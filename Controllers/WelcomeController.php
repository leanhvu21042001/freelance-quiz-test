<?php

class WelcomeController extends BaseController
{
    public function index()
    {
        $this->view('frontend.welcome.index');
    }
}
