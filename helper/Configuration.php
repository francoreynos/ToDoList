<?php
include_once("helper/MysqlDatabase.php");
include_once("helper/Render.php");
include_once("helper/UrlHelper.php");

include_once("controller/ToDoListController.php");
include_once("controller/AnalyticsController.php");

include_once("model/ToDoListModel.php");
include_once("model/AnalyticsModel.php");


include_once('third-party/mustache/src/Mustache/Autoloader.php');
include_once("Router.php");

class Configuration
{

    private function getDatabase()
    {
        $config = $this->getConfig();
        return new MysqlDatabase(
            $config["servername"],
            $config["username"],
            $config["password"],
            $config["dbname"]
        );
    }

    private function getConfig()
    {
        return parse_ini_file("config/config.ini");
    }


    public function getRender()
    {
        return new Render('view/partial');
    }

    public function getRouter()
    {
        return new Router($this);
    }

    public function getUrlHelper()
    {
        return new UrlHelper();
    }

    public function getToDoListController()
    {
        $toDoListModel = $this->getToDoListModel();
        return new ToDoListController($this->getRender(),$toDoListModel);
    }

    public function getToDoListModel()
    {
        $database = $this->getDatabase();
        return new ToDoListModel($database);
    }

    public function getAnalyticsController(){

        $AnalyticsModel = $this->getAnalyticsModel();
        return new AnalyticsController($this->getRender(),$AnalyticsModel);

    }

    public function getAnalyticsModel()
    {
        $database = $this->getDatabase();
        return new AnalyticsModel($database);
    }

}