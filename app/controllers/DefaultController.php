<?php
namespace app\controllers;
class DefaultController extends Controller
{
    public function indexAction()
    {
        \app\views\View::render('index', [
                    'tasks' => 11111111
                ]);
    }
}