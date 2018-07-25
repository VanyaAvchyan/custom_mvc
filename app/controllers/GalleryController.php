<?php
namespace app\controllers;
use app\views\View;
use app\services\GalleryService;
class GalleryController extends Controller
{
    public function indexAction()
    {
        $service = new GalleryService();
//        dd($service->getAll());
        View::render('galery/index', [
            'galleries' => $service->getAll()
        ]);
    }
}