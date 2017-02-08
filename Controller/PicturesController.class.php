<?php
class PicturesController extends MyController {

    private $PicturesModel;

    public function __construct() {
        $this->PicturesModel = new PicturesModel();
    }

    public function getAllPictures() {
        $result = $this->PicturesModel->getAllPictures();

        return $result;
    }

    public function getPicture($id) {
        $result = $this->PicturesModel->getPicture($id);

        return $result;
    }

    public function addPicture($pic) {
        $this->PicturesModel->addPicture($pic);
    }
}
?>