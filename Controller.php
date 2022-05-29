<?php

class Controller
{
    private View $view;
    private MySql $mysql;
    public function __construct()
    {
        $this->view = new View();
        $this->mysql = new MySql();
    }
    public function get()
    {
        $this->view->renderAds($this->mysql->getAds(), $this->mysql->getCategories());
    }
    public function post()
    {
        if (empty($_POST["email"]) || empty($_POST["title"]) || empty($_POST["description"]) || empty($_POST['category']))
        {
            echo "ERROR 404";
            return;
        }

        $this->mysql->saveAd(new Ad($_POST["email"], $_POST['category'], $_POST["title"], $_POST["description"]));
        $this->view->renderAds($this->mysql->getAds(), $this->mysql->getCategories());
    }
}
$controller = new Controller();
try {
    if($_SERVER['REQUEST_METHOD'] === 'GET')
    {
        $controller->get();
    }
    elseif ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $controller->post();
    }
} catch (\Throwable $th) {
    echo "ERROR 404";
}