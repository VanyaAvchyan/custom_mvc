<?php
namespace app\controllers;
use app\views\View;
use app\services\GalleryService;
class AuthController extends Controller
{
    public function indexAction()
    {
        View::render('/auth/login');
    }

    public function loginAction()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $galleryService = new GalleryService();
            redirect_to('/gallery');
        }
        View::render('/auth/login');
    }
}