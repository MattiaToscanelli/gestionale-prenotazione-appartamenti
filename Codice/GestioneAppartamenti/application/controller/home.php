<?php


class Home
{

    public function index()
    {
        require_once 'application/models/homeModel.php';
        $hm = new HomeModel();
        $pictures = $hm->getAllPathHomePicture();
        $news = $hm->getAllNews();

        require_once "application/views/_template/header.php";
        require_once "application/views/home.php";
        require_once "application/views/_template/footer.php";
    }


}
