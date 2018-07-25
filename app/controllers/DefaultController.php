<?php
namespace app\controllers;
use app\views\View;
class DefaultController extends Controller
{
    public function indexAction()
    {
        View::render('index');
    }
}