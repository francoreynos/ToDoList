<?php

class AnalyticsController
{
    private $render;

    public function __construct($render, $analyticsModel)
    {
        $this->render = $render;
        $this->analyticsModel = $analyticsModel;
    }

    public function execute()
    {
        if (isset($_GET["date1"]) && isset($_GET["date2"])) {
            $date1 = $_GET["date1"];
            $date2 = $_GET["date2"];
        } else {
            $date1 = $this->analyticsModel->getCurrentDate();
            $date2 = $this->analyticsModel->getCurrentDateMinus7Days();
        }

        if (isset($_GET["created"])) {
            $data["created"] = $_GET["created"];
        } elseif (isset($_GET["completed"])) {
            $data["completed"] = $_GET["completed"];
        } elseif (isset($_GET["createdAndCompleted"])) {
            $data["createdAndCompleted"] = $_GET["createdAndCompleted"];
        }

        $tasksCreated = $this->analyticsModel->getTasksCreatedBetween($date1, $date2);
        $tasksCompleted = $this->analyticsModel->getTasksCompletedBetween($date1, $date2);
        $tasksCreatedAndCompleted = $this->analyticsModel->getTasksCreatedAndCompletedBetween($date1, $date2);
        $data["date1"] = $date1;
        $data["date2"] = $date2;
        $data["tasksCreated"] = $tasksCreated;
        $data["tasksCompleted"] = $tasksCompleted;
        $data["tasksCreatedAndCompleted"] = $tasksCreatedAndCompleted;

        echo $this->render->render("view/analytics.php", $data);
    }
}

