<?php
namespace app\services;
use app\models\GalleryModel;
class GalleryService {
    private $model;
    public function __construct() {
        $this->model = new GalleryModel();
    }

    /**
     * Get list
     *
     * @return array|booblean Return all user
     */
    public function getAll()
    {
        return $this->model->data;
    }

    /**
     * Delete by id
     * 
     * @param int $id
     * @return booblean
     */
    public function delete($id)
    {

    }
}